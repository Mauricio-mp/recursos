<h1>{{ModeDsc}}</h1>
<!-- INS, UPD DEL DSP
`codigo_curso`, `desc_curso`, `estado_curso`
-->

<hr />
<form action="index.php?page=curso&mode={{mode}}&cod={{codigo_curso}}" method="post">
    <label>Código</label>
    <input type="text" maxlength="7" placeholder="Código del Curso"
            name="codigo_curso" value="{{codigo_curso}}"  {{pkreadonly}} {{readonly}}/>
    <br/>
    <label>Descripción</label>
    <input type="text" maxlength="40" placeholder="Descripción del Curso"
            name="desc_curso" value="{{desc_curso}}"  {{readonly}}/>
      <br />
      <label>Estado</label>
      <select name="estado_curso" class="{{readonly}}" {{selreadonly}}>
          {{foreach estados}}
              <option value="{{cod_estado}}" {{selected}} {{selreadonly}}>{{dsc_estado}}</option>
          {{endfor estados}}
      </select>
      <br />
      {{if showBtn}}
        <button type="submit" name="btnGuardar" class="btn btn-primary">{{ActionBtn}}</button>
        &nbsp;
      {{endif showBtn}}
      <a href="index.php?page=cursos" class="btn btn-danger">Cancelar</a>
</form>
{{if hasError}}
    {{foreach errores}}
        {{error}} <br />
    {{endfor errores}}
{{endif hasError}}
