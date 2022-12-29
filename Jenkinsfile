pipeline {
    agent any
	
  	environment { 
   		NAME = "test-project"
   		VERSION = "${env.BUILD_NUMBER}"
   		IMAGE = "${NAME}:${VERSION}"
		PREV_BUILD = "${currentBuild.previousBuild.number}"
 	}
	stages {
    	stage("Preparing build new Image") {
            steps {
				echo "Previous build was #${PREV_BUILD}"
                echo "Running build #${VERSION} on ${env.JENKINS_URL}"
                echo "For branch: ${env.BRANCH_NAME} with commit id: ${env.GIT_COMMIT}"
				withDockerRegistry([ credentialsId: 'dockerhub-colmitra', url: "" ]) {
					sh "docker build -t colmitra/${IMAGE} ."
					sh "docker push colmitra/${IMAGE}"
				}
            }
        }
		stage("Run the new Image as Container") {
			steps {
				sh "docker run -d -p 2022:8000 colmitra/${IMAGE} --name ${NAME}-${VERSION}"
				sh "docker ps"
			}
		}
		stage("Shutting down the previous Container") {
			steps {
				sh "docker stop ${NAME}-${PREV_BUILD}"
			}
		}
		stage("Remove previous Image") {
			steps {
				sh "docker rmi ${NAME}-${PREV_BUILD}"
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
