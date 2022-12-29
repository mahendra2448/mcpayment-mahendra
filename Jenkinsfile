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
                echo "Running build #${VERSION} on ${env.JENKINS_URL}"
                echo "For branch: ${env.BRANCH_NAME} with commit id: ${env.GIT_COMMIT}"
				withDockerRegistry([ credentialsId: 'dockerhub-colmitra', url: "" ]) {
					sh "docker build -t colmitra/${NEW_IMAGE} ."
					sh "docker push colmitra/${NEW_IMAGE}"
				}
            }
        }
		stage("Run the new Image as Container") {
			steps {
				sh "docker run -d -p 2022:8000 colmitra/${NEW_IMAGE} --name ${NAME}-${VERSION} --verbose"
				sh "docker ps"
			}
		}
		stage("Shutting down the previous Container") {
			steps {
				sh "docker stop ${NAME}-${PREV_VERSION}"
			}
		}
		stage("Remove previous Image") {
			steps {
				sh "docker rmi colmitra/${PREV_IMAGE}"
			}
		}
        stage("Finishing...") {
            steps {
                sh "php artisan --version"
				sh "php artisan optimize:clear"
				sh "php artisan serve --port=2022"
            }
        }
	}
}
