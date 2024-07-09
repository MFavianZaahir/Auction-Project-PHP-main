# Auction Project

This is a PHP project that needs to be placed in the `htdocs` folder and run on `localhost` using XAMPP.

## Prerequisites

Before you begin, ensure you have the following installed on your system:

- [XAMPP](https://www.apachefriends.org/index.html)

## Installation

1. **Download and Install XAMPP:**
   - Download XAMPP from the official [XAMPP website](https://www.apachefriends.org/index.html).
   - Follow the instructions to install XAMPP on your system.

2. **Clone the Repository:**
   - Clone this repository to your local machine using the following command:
     ```bash
     git clone https://github.com/your-username/your-repository.git
     ```

3. **Move the Project to `htdocs` Folder:**
   - Copy the cloned project folder to the `htdocs` directory inside your XAMPP installation directory. The path typically looks like this:
     ```
     C:\xampp\htdocs\your-project-folder
     ```

## Running the Project

1. **Start Apache and MySQL:**
   - Open the XAMPP Control Panel.
   - Start the Apache server and MySQL by clicking on the `Start` button next to each service.

2. **Access the Project in Your Browser:**
   - Open your web browser and go to the following URL:
     ```
     http://localhost/your-project-folder
     ```

## Configuration

If your project requires any configuration, such as setting up a database, follow the steps below:

1. **Create a Database:**
   - Open the XAMPP Control Panel and click on `Admin` next to MySQL to open phpMyAdmin.
   - Create a new database for your project.

2. **Import Database Schema:**
   - In phpMyAdmin, select the newly created database.
   - Click on the `Import` tab and choose the SQL file provided in the `database` folder of your project.
   - Click `Go` to import the database schema.

3. **Configure Database Connection:**
   - Open the project folder in a text editor.
   - Locate the configuration file where database connection settings are defined (usually `config.php` or similar).
   - Update the database connection details (host, username, password, database name) to match your local setup.

## Usage

Provide instructions on how to use the project, including any specific features or functionalities that users should be aware of.

## Contributing

If you would like to contribute to this project, please follow these steps:

1. Fork the repository.
2. Create a new branch for your feature or bugfix.
3. Commit your changes.
4. Push the branch to your forked repository.
5. Open a pull request to the main repository.

## Acknowledgements

this code was wrote by [@DerylFeyza] and [@panntod]
