
# Automated File Deletion Script

`auto-delete-files` is a PHP script designed to automatically delete files from the server that are older than a specified duration, based on the file's creation date stored in the database. It uses a cron job to schedule regular checks and clean up old files to save server storage.

## Features
- Automatically deletes files that are older than a specified duration (e.g., 2 months).
- Checks file creation dates from the database to determine if a file should be deleted.
- Customizable database connection and table for different use cases.
- Works with any file directory structure (modify as needed).

## Requirements
- PHP 5.6 or higher
- MySQL database
- Cron job set up on the server to execute the script at regular intervals.

## Installation

1. **Set up the Database Connection**:
   Open the `autoremove.php` file and modify the database connection settings:
   
   ```php
   $dbhost = 'localhost';
   $dbname = 'database';
   $dbuser = 'root';
   $dbpassword = '';
   ```

2. **Modify Table Name**:
   Ensure that the SQL query in `autoremove.php` corresponds to your database table where file information is stored.

   ```php
   $result = mysqli_query($mysqli, "SELECT * FROM table");
   ```

3. **Upload Files**:
   Place `autoremove.php` on your server where the cron job will run.

4. **Set up Cron Job**:
   Set up a cron job to run the script at a desired frequency (e.g., daily or weekly).

   Example (Run daily at midnight):
   ```bash
   0 0 * * * /usr/bin/php /path/to/autoremove.php
   ```

## Customization

- Modify the duration for deletion (currently set to files older than 2 months).
- Update the path where the files are stored (currently set to `./assets/upload/`).
- Customize the SQL query if you need to filter files based on different criteria (e.g., file size, type, etc.).

## Contributing

Feel free to fork the repository and submit pull requests for improvements or fixes.

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.
