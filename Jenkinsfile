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
                sh 'php --version'
                echo "Running ${VERSION} on ${env.JENKINS_URL}"
                echo "for branch: ${env.BRANCH_NAME}"
				echo "commit message: ${env.GIT_COMMIT}"
                sh 'docker build -t ${IMAGE} .'
				sh 'docker push ${IMAGE}'
            }
        }
		stage("Shutting down the previous Image") {
			steps {
				sh 'docker-compose down'
			}
		}
		stage("Run the new Image") {
			steps {
				sh 'docker-compose up -d'
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
