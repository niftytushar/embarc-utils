#embarc-utils

Utilities for Embarc Information Technology

##Modules
- [x] DHL Courier Service Management
- [ ] Employee Attendance Management
- [x] Inventory Management
- [x] Server Status Utility
- [ ] Server Maintenance Log Manager
- [x] Users
- [ ] Mails
- [ ] Device Simulator
- [ ] Settings

##Backup the database
1. Change your working directory to setup, using `cd setup`
2. Run the setup file `./setup -b`
3. A backup file will be created in the setup directory itself, named embarcUtilities.sql

##Restore the database
1. Change your working directory to setup, using `cd setup`
2. Make sure the backup file is present in this folder, named as embarcUtilities.sql
3. Run the setup file `./setup -r`
4. Data from the backup file will be transferred to the appropriate database