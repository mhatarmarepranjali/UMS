# User Management Form  

## Created Three pages for Add,Edit,View Information
## View Pages Name :
- Main Page name is :welcome_message.php
- View page Name: view_user.php
- Edit page Name :edit_user.php
- Export PDF page Name: export_pdf.php

## Controller Name:
Home.php
# Below is the function name from controller:
- When Click to submit button for adding the data the function name is  :store
- When Click on edit Icon from table will redirected to edit screen the name is : edituser
- When Updated the form :update
- If you want to deleted the user info then call function : delete
- If you want to export the data using excel : exportToExcel
- If you want to export the data using pdf : exportToPDF

## Models Name:
User.php

I have Design bootstrap 5 form with user details. 
First Name,Last Name,Email,Date,Gender,Address,Profile pic with jquery validations.

## Design table to showing the user data.
Added icons in action column and redirected to view page and edit page.

## Added Export to Excel Functionality using Spreadsheet.
## Added Export to PDF Functionality using Mpdf.
## Created database  Database name : 'dbsymphony'.
## Created table in database  Database name : 'users' and added columns in this for store the user data and updated it.
