pipeline {
    agent any
	
  	environment { 
   		NAME = "test-project"
   		VERSION = "${env.BUILD_NUMBER}"
   		IMAGE = "${NAME}:${VERSION}"
 	}
	stages {
    	stage("Preparing build new Image") {
            steps {
                echo "Running build #${VERSION} on ${env.JENKINS_URL}"
                echo "For branch: ${env.BRANCH_NAME} with commit id: ${env.GIT_COMMIT}"
				sh "docker login -u ${env.DOCKER_UNAME} --password-stdin ${env.DOCKER_PW} docker.io"
                sh "docker build -t colmitra/${IMAGE} ."
				sh "docker push colmitra/${IMAGE}"
            }
        }
		stage("Run the new Image") {
			steps {
				sh "docker run -d -p 2022:8000 colmitra/${IMAGE} --name ${IMAGE}"
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
