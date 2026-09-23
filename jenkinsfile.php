pipeline {
    agent {
        node {
            label 'windows'
        }
    }

    stages {
        stage('Checkout') {
            steps {
                checkout scm
            }
        }

        stage('Install Dependencies') {
            steps {
                bat 'python -m pip install --upgrade pip'
                bat 'pip install -r requirements.txt'
            }
        }

        stage('Run Unit Tests') {
            steps {
                bat 'pytest -v'
            }
        }
    }

    post {
        success {
            echo 'SUCCESS: All unit tests passed successfully!'
        }
        failure {
            echo 'FAILURE: Unit tests failed or an error occurred during execution.'
        }
    }
}