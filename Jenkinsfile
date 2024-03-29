// Additional env
env.DEVMOBILEAPI= 'mobile-api-dev.colmitra.id'

pipeline {
    agent any
	
  	environment { 
   		NAME = "test-project"
   		VERSION = "${env.BUILD_NUMBER}"
   		NEW_IMAGE = "${NAME}:${VERSION}"
		PREV_IMAGE = "${NAME}:${currentBuild.previousBuild.number}"
		PREV_VERSION = "${currentBuild.previousBuild.number}"
 	}
	stages {
		stage("Shutting down the previous Container") {
			steps {
				script {
					try {
						def containers = sh(returnStdout: true, script: "docker container ls -q --filter name=$NAME*")
						if (containers) {
							sh "docker stop ${containers}"
							echo "Previous container stopped successfully."
						} else {
							echo 'Nothing to stop, container is not exists.'
						}

					} catch (Exception e) {
						echo "Stage return an error, but we keep continue. ${e}"
					}
				}
			}
		}
    	stage("Preparing build new Image") {
            steps {
				echo "Previous build was #${PREV_VERSION}"
				echo "Now running build #${VERSION} on ${env.JENKINS_URL}"
				echo "For branch: ${env.BRANCH_NAME} with commit id: ${env.GIT_COMMIT}"
				
				sh """
				sed -i -e 's/local/development/g' .env.local
				sed -i -e 's/app_url/$DEVMOBILEAPI/g' .env.local
				"""
				withDockerRegistry([ credentialsId: 'dockerhub-colmitra', url: "" ]) {
					sh "docker build -t colmitra/${NEW_IMAGE} ."
					sh "docker push colmitra/${NEW_IMAGE}"
				}
            }
        }
		stage("Remove previous Image") {
			steps {
				script {
					try {
						def images = sh(returnStdout: true, script: "docker images 'colmitra/$NAME*' --quiet")
						def imageTags = sh(returnStdout: true, script: "docker images 'colmitra/$NAME*' --format='{{json .Tag}}' | jq --slurp")
        				def tags = readJSON text: imageTags

						for (int i = 0; i < tags.size(); i++) {
							tag = tags[i]
							newtag = tag.toInteger()
							thisBuild = VERSION.toInteger()
							
							echo "[Pake for loop] Tag: ${newtag} < ${thisBuild}"
							if (newtag < thisBuild) {
								sh "docker rmi 'colmitra/$NAME:${tag}' -f"
								echo "Last image 'colmitra/$NAME:${tag}' has been removed successfully."
								sh "docker images"
							} else {
								echo 'Nothing to remove, there are no previous image.'
							}
						}
						
					} catch (Exception e) {
						echo "Stage return an error, but we keep continue. ${e}"
					}
				}
			}
		}
		stage("Run the new Image as Container") {
			steps {
				sh "docker run -d -p 2022:8000 --name=${NAME}-${VERSION} colmitra/${NEW_IMAGE}"
				sh "docker ps"
				sh "docker images"
			}
		}
        stage("Finishing...") {
            steps {
                echo "Done build"
            }
        }
	}
}
