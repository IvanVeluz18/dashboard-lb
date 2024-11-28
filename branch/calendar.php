<?php
include('../utils.php');
include('incSecure.php');

$Date1 = cleanstr($_GET['Date1'], 'date');
$Date2 = cleanstr($_GET['Date2'], 'date');

if ($Date1 == ''){
 $Date1 = left($maniladate, 7) . '-01';
 $Date2 = $maniladate;
}

include('incTop.php');
include('incNav.php');
?>

<div class="container-fluid"><div class="row">

 <div class="col-md-4 my-4">
  <div class="input-group">
   <input type="date" class="form-control" value="<?=$maniladate?>">
   <button class="btn border bg-white">🔍</button>
  </div>
 </div>

 <div class="col-md-4 my-4">
  <div class="input-group w-100">
   <span class="input-group-text bg-white">➕</span>
   <button class="form-control btn border bg-white"><i class="fa text-secondary fa-calendar-check me-2"></i> Appointment</button>
   <button class="form-control btn border bg-white"><i class="fa text-secondary fa-money-bills me-2"></i> Transaction</button>
  </div>
 </div>

 <div class="col-md-4 my-4">
  <div class="input-group">
   <span class="input-group-text bg-white">📃</span>
   <button class="form-control btn border bg-white"><i class="fa text-secondary fa-hourglass-half me-2"></i> Waitlist</button>
   <button class="form-control btn border bg-white"><i class="fa text-secondary fa-person-walking me-2"></i> Walk Out</button>
  </div>
 </div>

 <div class="col-md-12">
  <table class="table table-bordered" id="resourceTimeGrid">
      <thead>
        <tr>
          <th>Time</th>
          <th data-resource="Aida">
           <div class="d-flex align-items-center">
            <div class="flex-shrink-0"> <img src="aida.jpg" width="100"> </div>
            <div class="flex-grow-1 ms-3">
             Aida <br>
             <small class="fw-light">
              1 Booked<br>
              0 Checked-In<br>
              0 Completed
             </small>
            </div>
           </div>
          </th>
          <th data-resource="Lorna">
           <div class="d-flex align-items-center">
            <div class="flex-shrink-0"> <img src="lorna.jpg" width="100"> </div>
            <div class="flex-grow-1 ms-3"> Lorna <br>
             <small class="fw-light">
              1 Booked<br>
              0 Checked-In<br>
              0 Completed
             </small>
            </div>
           </div>
          </th>
          <th data-resource="Fe">
           <div class="d-flex align-items-center">
            <div class="flex-shrink-0"> <img src="fe.jpg" width="100"> </div>
            <div class="flex-grow-1 ms-3"> Fe <br>
             <small class="fw-light">
              0 Booked<br>
              0 Checked-In<br>
              0 Completed
             </small>
            </div>
           </div>
          </th>
        </tr>
      </thead>
      <tbody id="timeSlots">
        <!-- Rows populated by JavaScript -->
      </tbody>
    </table>
 </div>
  
</div></div>
    
<?php
include('incFoot.php');
?>
<script>
 $(document).ready(function() {
   const startTime = 10;
   const endTime = 22;
   const resources = ['Aida', 'Lorna', 'Fe'];
   const events = [
     { title: 'Gwen Stacy', resource: 'Aida', start: '11:00', end: '11:00' },
     { title: 'Black Canary', resource: 'Aida', start: '14:00', end: '11:00' },
     { title: 'Lois Lane', resource: 'Aida', start: '13:00', end: '11:00' },
     { title: 'Pepper Pots', resource: 'Lorna', start: '15:00', end: '11:00' },
     { title: 'Mary Jane Watson', resource: 'Lorna', start: '14:00', end: '15:00' }
   ];

   // Generate time slots dynamically
   for (let hour = startTime; hour <= endTime; hour++) {
     let row = `<tr><td>${hour}:00</td>`;
     resources.forEach(() => row += '<td class="time-slot"></td>');
     row += '</tr>';
     $('#timeSlots').append(row);
   }

   // Map events to appropriate time slots
   events.forEach(event => {
     const eventStart = parseInt(event.start.split(':')[0]);
     const rowIndex = eventStart - startTime;
     const colIndex = resources.indexOf(event.resource) + 1; // +1 to account for "Time" column
     const cell = $('#resourceTimeGrid tbody tr').eq(rowIndex).find('td').eq(colIndex);
     
     cell.addClass('bg-info text-white').text(event.title).click(function(){
      console.log($(this).text());
     });
   });
 });
</script>