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
				sh 'docker login'
                sh 'docker build -t ${IMAGE} .'
				sh 'docker push ${IMAGE}'
            }
        }
		stage("Run the new Image") {
			steps {
				sh 'docker-compose up -d'
			}
		}
		stage("Shutting down the previous Image") {
			steps {
				sh 'docker-compose down ${NAME}:${VERSION -1}'
			}
		}
		stage("Remove previous Image") {
			steps {
				sh 'docker rmi ${NAME}:${VERSION -1}'
			}
		}
        stage("Finishing...") {
            steps {
                sh 'php artisan --version'
				sh 'php artisan optimize:clear'
            }
        }
	}
}
