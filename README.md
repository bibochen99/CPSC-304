Our project use Mysql in the UBC databases.

Download all the php file and sql file in our Github, then put it into UBC service computer. 
Put the files into public_html folder and give it promission, then into the folder to give the promission by chmod 755 * for all file.

To start the mysql:
1. Go to UBC service computer (remote.students.cs.ubc.ca)
2. login to our databases use: mysql -h dbserver.students.cs.ubc.ca -u rzhong01 -p, password: a38917878. (Since we need to demo the project, we empty the datbases already)
3. To load the sql file into databases: source db.sql

Then open the project.php file by https://www.students.cs.ubc.ca/~xxx/project.php, where replace xxx to your CSID to host it.
