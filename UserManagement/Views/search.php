<section>
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <h2>Search</h2>
      </div>
    </div>
  </div>
  <div class="container mt-5 mb-5" id="add">
    <table> 
      <thead>
        <tr>
          <th>Code</th>
          <th></th>
      </thead>
      <tbody>
        <tr>
          <td>
            <input type="number" class="form-control" name="code" id="code" min="1" required>
          </td>
        </tr>
        </tbody>
    </table>
  </div>
  <div class="container mb-5" id="list">
    <table class="table table-bordered table-striped table-info">
      <thead class="thead-dark">
        <tr>
          <th>ID database</th>
          <th>Code</th>
          <th>First name</th>
          <th>Last name</th>
          <th>Email</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><input type="text" class="form-control" id="idField" size="15" readonly></td>
          <td><input type="text" class="form-control" id="codeField" size="15" readonly></td>
          <td><input type="text" class="form-control" id="firstNameField" size="15" readonly></td>
          <td><input type="text" class="form-control" id="lastNameField" size="15" readonly></td>
          <td><input type="text" class="form-control" id="emailField" size="15" readonly></td>
        </tr>                       
      </tbody>
    </table>
  </div>
</section>

<!-- jQuery -->
<script>

$("#code").keyup(function() {
  console.log("AJAX call");
  var code = ($("#code").val()).toString();
  
  $.ajax({
    url: "<?php echo BASE?>User/loadUser",
    type: "POST",
    dataType: "json",
    data: {"code":code},
    success: function(response) {
      console.log(response);
      
      var id = response["id"];
      var code = response["code"];
      var firstName = response["firstName"];
      var lastName = response["lastName"];
      var email = response["email"];

      $("#idField").val(id);
      $("#codeField").val(code);
      $("#firstNameField").val(firstName);
      $("#lastNameField").val(lastName);
      $("#emailField").val(email);
    }
  });
});

</script>