<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

  <!-- Styles -->
  <link rel="stylesheet" href="styles.css">

  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/a38fe824ea.js" crossorigin="anonymous"></script>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

  <title>Restigo</title>
</head>

<body>
  <?php include "./modals/add_item.php"; ?>
  <?php include "./modals/edit_item.php"; ?>
  <?php include "./modals/delete_item.php"; ?>
  <?php include "./modals/add_client.php"; ?>
  <?php include "./modals/edit_client.php"; ?>
  <?php include "./modals/delete_client.php"; ?>
  <?php include "./modals/add_diversity.php"; ?>
  <?php include "./modals/edit_diversity.php"; ?>
  <?php include "./modals/delete_diversity.php"; ?>
  <?php include "./navbar.php" ?>
  <div class='container mt-5'>
    <?php include "./tables/items.php" ?>
    <?php include "./tables/clients.php" ?>
    <?php include "./tables/diversities.php" ?>
    <?php include "./tables/diversities_clients.php" ?>
    <?php include "./tables/diversities_items.php" ?>
  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  <script src=" https://cdnjs.cloudflare.com/ajax/libs/mustache.js/4.0.1/mustache.min.js"></script>

  <script type="text/javascript" src="js/clients.js"></script>
  <script type="text/javascript" src="js/items.js"></script>
  <script type="text/javascript" src="js/diversities.js"></script>
  <script type="text/javascript" src="js/diversities_clients.js"></script>
  <script type="text/javascript" src="js/diversities_items.js"></script>


  <!-- Mustache Templates -->
  <script id='item-row-template' type="text/html">
  {{#items}}
    <tr>
      <th scope="row">{{catalog_number}}</th>
      <td>{{name}}</td>
      <td>{{price}}$</td>
      <td class='text-center'>
        {{#has_vat}}
          <i class="far fa-2x fa-check-circle text-success"></i>
        {{/has_vat}}
        {{^has_vat}}
          <i class="far fa-2x fa-times-circle text-danger"></i>
        {{/has_vat}}

      </td>
      <td class='text-center'>
        {{#enable}}
          <i class="far fa-2x fa-check-circle text-success"></i>
        {{/enable}}
        {{^enable}}
          <i class="far fa-2x fa-times-circle text-danger"></i>
        {{/enable}}
      </td>
      <td class='text-center'>
        <button id={{catalog_number}} class='btn btn-outline-primary edit_item'>
          <i class="far fa-edit "></i>
        </button>
        <button id={{catalog_number}} class='btn btn-outline-danger delete_item_id'>
          <i class="fa fa-trash "></i>
        </button>
      </td>
    </tr>
  {{/items}}
  </script>

  <script id='client-row-template' type="text/html">
  {{#clients}}
    <tr>
      <th scope="row">{{name}}</th>
      <td>{{type}}</td>
      <td class='text-center'>
        {{#enable}}
          <i class="far fa-2x fa-check-circle text-success"></i>
        {{/enable}}
        {{^enable}}
          <i class="far fa-2x fa-times-circle text-danger"></i>
        {{/enable}}
      </td>
      <td class='text-center'>
        <button id={{name}} type='button' class='btn btn-outline-primary edit_client'>
          <i class="far fa-edit "></i>
        </button>
        <button id={{name}} class='btn btn-outline-danger delete_client_name'>
          <i class="fa fa-trash "></i>
        </button>
      </td>
    </tr>
  {{/clients}}
  </script>

  <script id='diversity-row-template' type="text/html">
  {{#diversities}}
    <tr>
      <th scope="row">{{name}}</th>
      <td class='text-center'>
        {{#enable}}
          <i class="far fa-2x fa-check-circle text-success"></i>
        {{/enable}}
        {{^enable}}
          <i class="far fa-2x fa-times-circle text-danger"></i>
        {{/enable}}
      </td>
      <td class='text-center'>
        <button id={{name}} type='button' class='btn btn-outline-primary edit_diversity'>
          <i class="far fa-edit "></i>
        </button>
        <button id={{name}} class='btn btn-outline-danger delete_diversity_name'>
          <i class="fa fa-trash "></i>
        </button>
      </td>
    </tr>
  {{/diversities}}
  </script>

  <script id='diversity_client-row-template' type="text/html">
  {{#diversities_clients}}
    <tr>
      <th scope="row">{{client_name}}</th>
      <th scope="row">{{diversity_name}}</th>
    </tr>
  {{/diversities_clients}}
  </script>

  <script id='diversity_item-row-template' type="text/html">
  {{#diversities_items}}
    <tr>
      <th scope="row">{{name}}</th>
      <th scope="row">{{diversity_name}}</th>
    </tr>
  {{/diversities_items}}
  </script>

</body>

</html>