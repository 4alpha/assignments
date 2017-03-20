1. Code formatting is must but differs and depends on language or type of file.
HTML type = "submit" should be type="submit"

2. Use css instead of style it saves time, duplication and possible effort when
requires modification

3. Avoid <br> should use padding, margin or style for span

4. Remove duplication if ($_POST['submit'] == 'add') / 'update / 'delete could be clubbed together

5. Correct formatting
} echo "</table>";

6. Name your file correctly employeeOperation => employee.php is fine

7. include_once 'autoLoader.php'; has only auto loading or other functions ?
If it's group of task name it something else.

8. Change variable name / file name for autoLoader, Config

9. $objdao; => dao

10. getConnectToDB come up with better method name

11. Do we need "'); " ?

12. Move view logic like
return $result. "Employee Record inserted successfully !!";
from DAO to views
DAO should return entity, collection, boolean etc

13. Choose better name for DatabaseFiles
14.Why is public $db; in DBPostGres ??

15. function insert($queryInsert)
function update($queryUpdate) {
  function delete($queryDelete) {
    can you make out noise and do the correction ?

16. Correct implementation of custom Exceptions.

17 Entity formatting ? Are var private / public ? , getter setter ?



Design problem
- Employee creation, has many param and cumbersome to use

