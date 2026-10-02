<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</head>
<body>
   <div class="container">

        <!--Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add">
            Add Student
        </button>

        <!-- Modal -->
        <div class="modal fade" id="add" tabindex="-1" aria-labelledby="addStudentLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <form action="insert.php" method="POST">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="addStudentLabel">Modal title</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                        </div>

                    <div class="modal-body">                        
                        <div class="mb-3">
                            <label class="form-label">First Name</label>
                            <input type="text" name="firstname" class="form-control">
                        </div>
                        <div class="mb-3">
                          <label class="form-label">Last Name</label>
                          <input type="text" name="lastname" class="form-control">  
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">ADD</button>
                    </div>
                    </form>
                </div>
            </div>
         </div>

    <div class="row">
        <div class="col-12">
            <table class="table">
                <thead class="table-light">
                    <tr>
                        <th scope="col"> First Name</th>
                         <th scope="col"> Last Name</th>
                         <th scope="col"> Action</th>
                    </tr>
                </thead>

                <tbody>                    
                    <?php
                        include 'database.php';

                        $query = "SELECT id, firstname, lastname FROM studentss";
                        $stmt = $conn->prepare($query);
                        $stmt->bind_result($id, $firstname, $lastname);
                        $stmt->execute();

                        while ($stmt->fetch()) {
                    ?>
                    <tr>
                        <td><?php echo $firstname ?></td>
                        <td><?php echo $lastname ?></td>
                        <td>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#edit<?php echo $id ?>">
                                Edit Student
                            </button>
                            <a type="button" href="delete.php?id=<?php echo $id ?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>

            <!-- Modal -->
            <div class="modal fade" id="edit<?php echo $id; ?>" tabindex="-1" aria-labelledby="editStudentLabel<?php echo $id; ?>" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <form action="update.php" method="POST">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="editStudentLabel<?php echo $id; ?>">edit student</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                            </div>
                            
                    <div class="modal-body">
                        <input type="hidden" name="id" value="<?php echo $id ?>">
                            <div class="mb-3">
                                <label class="form-label">First Name</label>
                                <input type="text" value="<?php echo $firstname ?>" name="firstname" class="form-control">
                            </div>

                        <div class="mb-3">
                          <label class="form-label">Last Name</label>
                          <input type="text" name="lastname" value="<?php echo $lastname ?>" 
                                class="form-control">  
                        </div>
                    </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">SAVE CHANGES</button>
                        </div>
                        </form>
                </div>
            </div>
    </div>
                  <?php 
                  }
                  $stmt->close();
                  ?>   
                </tbody>
            </table>
        </div>
    </div>
   </div> 
</body>
</html>