<style>
  table{
    width:90%;
    margin:0px auto;
    border:1px solid #222;
  }
  tr:nth-child(2n){
    background-color: #aaa;
  }
</style>
<h1>Gestión de Cursos</h1>
<div>
  <table>
    <tr>
      <th>Código</th>
      <th>Curso</th>
      <th>Estado</th>
      <th><a href="index.php?page=curso&mode=INS">Nuevo</a></th>
    </tr>
    {{foreach cursos}}
    <tr>
      <td>{{codigo_curso}}</td>
      <td><a href="index.php?page=curso&mode=DSP&cod={{codigo_curso}}">{{desc_curso}}</a></td>
      <td>{{estado_curso}}</td>
      <td>
        <a href="index.php?page=curso&mode=UPD&cod={{codigo_curso}}">Editar</a>
  &nbsp;<a href="index.php?page=curso&mode=DEL&cod={{codigo_curso}}">Eliminar</a>
      </td>
    </tr>
    {{endfor cursos}}
  </table>
</div>
