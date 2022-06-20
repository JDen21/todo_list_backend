# API

## add task POST
### /todo_list_backend/index.php?ops=addTask
#### json body required
 name String
 description String
 startDate String format(yy-mm-dd)
 endDate String format(yy-mm-dd)

 ## edit taskFinished POST
 ### /todo_list_backend/index.php?ops=taskFinished
 #### json body required
 name String
 taskFinished boolean 0 1

 ## delete task POST
 ### /todo_list_backend/index.php?ops=deleteTask
 #### json body required
 name String

 ## get all tasks GET POST
 ### /todo_list_backend/index.php?ops=init
