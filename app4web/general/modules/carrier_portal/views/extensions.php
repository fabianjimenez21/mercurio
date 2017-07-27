<h2>EXTENSIONES</h2>

<a href="#" class="ui-shadow ui-btn ui-corner-all ui-btn-inline ui-btn-icon-left ui-icon-plus" onclick="javascript:load_page('carrier_portal','new_extension');">Nueva Extensión</a>
<br/>

<table id="server-table"  class="display" width="100%">
     <thead class="ui-bar-a ui-corner-all">
       <tr>
         <th data-priority="2">Extension</th>
         <th>Nombre</th>
         <th data-priority="3">Dominio</th>
         <th data-priority="1">Registrada</th>
         <th data-priority="1">Estado</th>
       </tr>
     </thead>
     <tbody>

!foreach {[extensions]} as ser!
<tr>
<td>{[ser:name]}</td>
<td>{[ser:related_to]}</td>
<td>{[ser:domain]}</td>
<td>{[ser:registered]}</td>
<td>{[ser:status]}</td>
</tr>
!end ser!

     </tbody>
</table>

<script>
$(document).ready(function() {
    $('#server-table').DataTable({
});
} );
</script>
