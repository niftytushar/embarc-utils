Utilities for Embarc Information Technology

Modules currently in this repository:
1. DHL Courier Service Management
2. Employee Attendance Management (to be deployed)
3. Settings (to be deployed)

Instructions for setting up database:
1. Create a database named 'embarcUtilities' in MySQL.
2. Import database dump using command line, as follows:
mysql -u<username> -p<password> embarcUtilities < embarcUtilities.sql
3. Navigate to embarc-utils/php/configuration.php
4. Check/Modify Database Name/Username/Password/Hostname if required.