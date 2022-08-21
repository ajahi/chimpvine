# chimpvine
Assignment from chimpvine to create a role_permission access control list

# 1. Project's Title
## ROLE PERMISSION ACCESS CONTROL

# 2. Project Description
This is a project created using;
php 8.1.8,
mysql 8.0.30,
HTML,
bootstrap.

A user can create,update,read,delete roles.
Roles{
      role_id:string,
      role_name:string
      };
Permission such as ;
  viewing permission,
  viewing roles;
  add roles;
  update roles;
  delete roles;
is given to certain roles(Super_admin,Admin,team_member,guest).Here most 
Permission is given to Super_admin(amit@company.com) .
Pivot tables(user_role,perm_role) are used to join other tables "Users,Roles and Permissions"
as per the wish required.

  


# 4. How to Install and Run the Project?
These instructions are said in the presuposition of the user has MYSQL 8.0.30,PHP 8.1.8. installed already.
1.Create table called "Role_permission_access_control" in your local network.
2.Run SQL present in the folder called "db", tables.sql should be followed by sample-data.sql.



# 5. How to Use the Project
-> Login using the given credentials.
-> Make sure data in the database.php contains valid username and password. 
-> Run sql file from the folder "db".
-> Login using credentials given.
-> 'Index.php' will only appear if your credentials is correct otherwise it will redirect to 'login.php'
-> amit@company.com has permission of super_admin who can view roles but cannot view permissions.
-> user->role->permission.
-> In index page Role, Permission List is given with provision for edit and deleting Roles.
-> Logout will log you out.


