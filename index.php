<?php
    $hotels = [

        [
            'name' => 'Hotel Belvedere',
            'description' => 'Hotel Belvedere Descrizione',
            'parking' => true,
            'vote' => 4,
            'distance_to_center' => 10.4
        ],
        [
            'name' => 'Hotel Futuro',
            'description' => 'Hotel Futuro Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 2
        ],
        [
            'name' => 'Hotel Rivamare',
            'description' => 'Hotel Rivamare Descrizione',
            'parking' => false,
            'vote' => 1,
            'distance_to_center' => 1
        ],
        [
            'name' => 'Hotel Bellavista',
            'description' => 'Hotel Bellavista Descrizione',
            'parking' => false,
            'vote' => 5,
            'distance_to_center' => 5.5
        ],
        [
            'name' => 'Hotel Milano',
            'description' => 'Hotel Milano Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 50
        ],

    ];
    $filtered_hotels= $hotels;

      if(!empty($_GET['parking']) || $_GET['parking'] = "0" ){
        $temp_hotels =[];
        foreach($filtered_hotels as $hotel){
          if($hotel['parking'] == $_GET['parking'] ){
            $temp_hotels[] = $hotel;
          }
        }
        $filtered_hotels = $temp_hotels;
      }
      if(!empty($_GET['vote'])){
        $temp_hotels =[];
        foreach($filtered_hotels as $hotel){
          if($hotel['vote'] >= $_GET['vote'] ){
            $temp_hotels[] = $hotel;
          }
        }
        $filtered_hotels = $temp_hotels;
      }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>PHP Hotel</title>
</head>
<body>
  <div class="container">
    <h3>Filtra gli Hotel</h3>
   <form class=" my-3">
      <label for="parcheggio" class="form-label">Parcheggio</label>
      <select id="parcheggio" name="parking" class="form-select">
        <option value="" selected>Nessuna preferenza</option>
        <option value="1">Si</option>
        <option value="0">No</option>
      </select>
      <label for="voto" class="form-label">Voto</label>
      <select  id="voto "name="vote" class="form-select">
        <option value="" selected>Nessuna preferenza</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
      </select>
      <div class="col-auto">
        <button type="submit" class="btn btn-primary my-3">Filtra</button>
      </div>
    </form>
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">Name</th>
          <th scope="col">Description</th>
          <th scope="col">Parking</th>
          <th scope="col">Vote</th>
          <th scope="col">Distance to center</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($filtered_hotels as $hotel) {?>
        <tr>
          <th scope="row"> <?php echo $hotel['name']?></th>
          <td><?php echo $hotel['description']?></td>
          <td><?php echo $hotel['parking'] ? 'si':'no'; ?></td>
          <td><?php echo $hotel['vote']?></td>
          <td><?php echo $hotel['distance_to_center']?></td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</body>
</html>