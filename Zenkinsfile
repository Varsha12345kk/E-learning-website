pipeline {
    agent any

    environment {
        DB_HOST = 'localhost'
        DB_USER = 'root'
        DB_PASS = ''
        DB_NAME = 'elearn_login'
    }

    stages {
        stage('Checkout Code') {
            steps {
                echo 'Cloning repository from GitHub...'
                git 'https://github.com/your-username/your-repo.git'
            }
        }

        stage('Install PHP') {
            steps {
                echo 'Checking PHP version...'
                sh 'php -v'  // Check if PHP is available
            }
        }

        stage('Test Database Connection') {
            steps {
                echo 'Running the database connection test...'
                sh 'php test_db.php'  // Run your database connection test
            }
        }
    }

    post {
        success {
            echo '✅ Database connection test passed.'
        }
        failure {
            echo '❌ Database connection test failed. Check the output.'
        }
    }
}
