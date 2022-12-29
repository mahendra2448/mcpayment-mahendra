pipeline {
    agent any
	
  	environment { 
   		VERSION = "${env.BUILD_NUMBER}"
   		NAME = "test-project-${VERSION}"
   		IMAGE = "${NAME}:${NAME}"
 	}
	stages {
    	stage("Preparing build new Image") {
            steps {
				echo previousBuild
                echo "Running build #${VERSION} on ${env.JENKINS_URL}"
                echo "For branch: ${env.BRANCH_NAME} with commit id: ${env.GIT_COMMIT}"
				withDockerRegistry([ credentialsId: 'dockerhub-colmitra', url: "" ]) {
					sh "docker build -t colmitra/${IMAGE} ."
					sh "docker push colmitra/${NAME}"
				}
            }
        }
		stage("Run the new Image") {
			steps {
				sh "docker run -d -p 2022:8000 colmitra/${NAME} --name ${NAME}"
				sh "docker ps"
			}
		}
		stage("Shutting down the previous Image") {
			steps {
				sh "docker stop ${NAME}:${VERSION -1}"
			}
		}
		stage("Remove previous Image") {
			steps {
				sh "docker rmi ${NAME}:${VERSION -1}"
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
