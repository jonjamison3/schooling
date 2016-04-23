<?php
/*
 * This page will edit and add product data to the database.
 */
require('database.php');
include ('header.php');
?>
<form action="AddIncident.php" method="Post">

  <br/>
  <br/>
  <h2>Add Incident</h2>
<table class="borderless">
  <span style='color:red;font-style:italic;font-weight:bold;margin-left:5%;font-size:1.1em;'><?php if (isset($feedback)){echo $feedback;} ?></span>
      <tr>
        <td>Customer ID: </td>
        <td>
          <input type="text" name ="txtCustomerID" value="<?php if (isset($customerID)){echo $customerID;}?>"/>
        </td>
        <td>
        </td>
      </tr>
      <tr>
        <td>Product Code: </td>
        <td>
          <input type="text" name ="txtProductCode"  value="<?php if (isset($productCode)){echo $productCode;}?>"/>
        </td>
        <td>
        </td>
      </tr>
      <tr>
        <td>Title: </td>
        <td>
          <input type="text" name ="txtTitle" value="<?php if (isset($title)){echo $title;}?>"/>
        </td>
        <td>
        </td>
      </tr>
      <tr>
        <td>Description: </td>
        <td>
          <textarea rowspan=2 name ="txtDescription">
             <?php if (isset($description)){echo $description;}?>
          </textarea>
        </td>
        <td>
        </td>
      </tr>
      <tr>
        <td>
        </td>
        <td>
          <input type="submit" name ="btnAddIncident" value="Add Incident"/>
        </td>
        <td>
        </td>
      </tr>
  </table>
  <br/>
  <br/>
  <a href="incidentList.php">View Incident List</a>
</form>

<?php include "footer.php";?>
