<fieldset>

    <legend>Datos Personales</legend>

    <label for="nombre">Nombre</label>
    <input 
        type="text" 
        id="nombre" 
        name="vendedor[nombre]" 
        placeholder="Nombre Vendedor(a)" 
        value="<?php echo sn($vendedor->nombre); ?>"
    >

    <label for="apellido">Apellido</label>
    <input 
        type="text" 
        id="apellido" 
        name="vendedor[apellido]" 
        placeholder="Apellido Vendedor(a)" 
        value="<?php echo sn($vendedor->apellido); ?>"
    >

</fieldset>

<fieldset>

    <legend>Informacion Extra</legend>

    <label for="telefono">Telefono</label>
    <input 
        type="phone" 
        id="telefono" 
        name="vendedor[telefono]" 
        placeholder="Telefono Vendedor(a)" 
        value="<?php echo sn($vendedor->telefono); ?>"
    >

    <label for="email">E-mail</label>
    <input 
        type="email" 
        id="email" 
        name="vendedor[email]" 
        placeholder="Correo Vendedor(a)" 
        value="<?php echo sn($vendedor->email); ?>"
    >

</fieldset>