<section>
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <h2>Users</h2>
      </div>
    </div>
  </div>
  <div class="container mt-5 mb-5" id="add">
    <form action="<?php echo BASE?>User/add" method="post">
      <table> 
        <thead>
          <tr>
            <th>Code</th>
            <th>First name</th>
            <th>Last name</th>
            <th>Email</th>
            <th></th>
        </thead>
        <tbody>
          <tr>
            <td>
              <input type="number" class="form-control" name="code" min="1" required>
            </td>
            <td>
              <input type="text" class="form-control" name="firstName" required>
            </td>
            <td>
              <input type="text" class="form-control" name="lastName" required>
            </td>
            <td>
              <input type="email" class="form-control" name="email" required>
            </td>
            <td>
              <button type="submit" class="btn btn-success ml-3"><strong>+</strong></button>
            </td>
          </tr>
          </tbody>
      </table>
    </form>
  </div>
  <div class="container mb-5" id="list">
    <form action="<?php echo BASE?>User/delete" method="post">
      <table class="table table-bordered table-striped table-info">
        <thead class="thead-dark">
          <tr>
            <th>ID database</th>
            <th>Code</th>
            <th>First name</th>
            <th>Last name</th>
            <th>Email</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
            foreach($userList as $user) {
              ?>
                <tr>
                  <td><?php echo $user->getId() ?></td>
                  <td><?php echo $user->getCode() ?></td>
                  <td><?php echo $user->getFirstName() ?></td>
                  <td><?php echo $user->getLastName() ?></td>
                  <td><?php echo $user->getEmail() ?></td>
                  <td class="text-center">
                    <button type="submit" name="code" class="btn btn-primary" value="<?php echo $user->getCode() ?>"> Remove </button>
                  </td>
                </tr>
              <?php
            }
          ?>                          
        </tbody>
      </table>
    </form>
  </div>
</section>