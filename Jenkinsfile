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
		stage("Shutting down the previous Container") {
			steps {
				sh "docker ps -qa --filter 'name=${NAME}-${PREV_VERSION}' | docker stop ${NAME}-${PREV_VERSION} || echo 'Nothing to stop, container is not exists.'"
				// echo "Gak dulu bang..."
				// sh "docker stop ${NAME}-${PREV_VERSION}"
			}
		}
		stage("Run the new Image as Container") {
			steps {
				sh "docker run -d -p 2022:8000 --name=${NAME}-${VERSION} colmitra/${NEW_IMAGE}"
				sh "docker ps"
			}
		}
		stage("Remove previous Image") {
			steps {
				sh "docker ps -qa --filter 'name=${NAME}-${PREV_VERSION}' | docker rmi colmitra/${PREV_IMAGE} -f || echo 'Nothing to remove, there are no previous image.'"
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
