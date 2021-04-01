Our project use Mysql in the UBC databases.

Download all the php file and sql file in our Github, then put it into UBC service computer. 
Put the files into public_html folder and give it promission, then into the folder to give the promission by chmod 755 * for all file.

To start the mysql:
1. Go to UBC service computer (remote.students.cs.ubc.ca)
2. login to our databases use: mysql -h dbserver.students.cs.ubc.ca -u rzhong01 -p, password: a38917878. (Since we need to demo the project, we empty the datbases already)
3. To load the sql file into databases: source db.sql

Then open the project.php file by https://www.students.cs.ubc.ca/~xxx/project.php, where replace xxx to your CSID to host it.

Add Movie to Your Movie list (INSERT):
  query is in “handlerinsert.php”
  
Delete Movie from Your Movies List (DELETE):
  query is in “handlerdelete.php”

Choose the Movie you want to watch(Type&Language) (Selection)
  query is in “handlerSelection.php”

Choose what you want to see in our movie list (Projection):
  query is in “handlerprojection.php”

Find the Corresponding Movie Name, product information, price and theatre location with the input year (Join):
  query is in “handlerjoin.php”

Find the name of movie that are played at all theatre (Division):
  query is in “handlerdivision.php”

Find the box office for all director in our list(Aggregation with Group By):
  query is in “handleGroupby.php”

Find the director that has more than the box office of your input number (Aggregation with Having):
  query is in “handlerHaving.php”

Select the type of rating to find the rating for movie that after year 2000 and its director, for each director have at least 2 movie of any year (Nested Aggregation with Group By):
  query is in “handlerNested.php”

Search by Your own customer ID, update information (UPDATE):
  query is in “handleUpdate.php”








