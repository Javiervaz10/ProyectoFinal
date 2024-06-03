// js/scripts.js

document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('nombre').addEventListener('input', function() {
        validarTexto(this);
    });
    document.getElementById('apellido_paterno').addEventListener('input', function() {
        validarTexto(this);
    });
    document.getElementById('apellido_materno').addEventListener('input', function() {
        validarTexto(this);
    });
    document.getElementById('puesto').addEventListener('input', function() {
        validarTexto(this);
    });
    document.getElementById('dias_trabajo').addEventListener('input', function() {
        validarNumero(this, 7);
    });
    document.getElementById('horas_trabajo').addEventListener('input', function() {
        validarNumero(this, 24);
        calcularHoraSalida();
    });
    document.getElementById('dias_vacaciones').addEventListener('input', function() {
        validarNumero(this, 24);
    });
    document.getElementById('registroForm').addEventListener('submit', mostrarMensajeRegistro);
    document.getElementById('verLista').addEventListener('click', mostrarDataGrid);
});

function validarTexto(input) {
    input.value = input.value.replace(/[^a-zA-Z\s]/g, '');
}

function validarNumero(input, max) {
    input.value = input.value.replace(/[^0-9]/g, '');
    if (parseInt(input.value) > max) {
        input.value = max;
    }
}

function calcularHoraSalida() {
    var horaEntrada = document.getElementById('hora_entrada').value;
    var horasTrabajo = document.getElementById('horas_trabajo').value;

    if (horaEntrada && horasTrabajo) {
        var [hora, minuto] = horaEntrada.split(':');
        var entrada = new Date();
        entrada.setHours(parseInt(hora));
        entrada.setMinutes(parseInt(minuto));

        entrada.setHours(entrada.getHours() + parseInt(horasTrabajo));

        var horaSalida = ('0' + entrada.getHours()).slice(-2) + ':' + ('0' + entrada.getMinutes()).slice(-2);
        document.getElementById('hora_salida').value = horaSalida;
    }
}

function mostrarMensajeRegistro(event) {
    event.preventDefault();
    const mensaje = document.getElementById('mensajeRegistro');
    mensaje.style.display = 'block';
    setTimeout(() => {
        document.getElementById('registroForm').submit();
    }, 2000);
}

function mostrarDataGrid(event) {
    event.preventDefault();
    window.location.href = "read.php";
}

function mostrarMensajeError() {
    const mensajeError = document.getElementById('mensajeError');
    mensajeError.style.display = 'block';
}

function ocultarMensajeError() {
    const mensajeError = document.getElementById('mensajeError');
    mensajeError.style.display = 'none';
}

document.getElementById('registroForm').addEventListener('submit', function(event) {
    if (!validarFormulario()) {
        event.preventDefault();
        mostrarMensajeError();
    }
});

function validarFormulario() {
    const nombre = document.getElementById('nombre').value;
    const apellidoPaterno = document.getElementById('apellido_paterno').value;
    const apellidoMaterno = document.getElementById('apellido_materno').value;
    const puesto = document.getElementById('puesto').value;
    const diasTrabajo = document.getElementById('dias_trabajo').value;
    const horasTrabajo = document.getElementById('horas_trabajo').value;
    const diasVacaciones = document.getElementById('dias_vacaciones').value;

    if (nombre === '' || apellidoPaterno === '' || apellidoMaterno === '' || puesto === '' || diasTrabajo === '' || horasTrabajo === '' || diasVacaciones === '') {
        return false;
    }

    // Aquí puedes agregar más validaciones si lo necesitas
    
    return true;
}

document.querySelectorAll('input').forEach(function(input) {
    input.addEventListener('input', ocultarMensajeError);
});



document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('nombre').addEventListener('input', validarTexto);
    document.getElementById('apellido_paterno').addEventListener('input', validarTexto);
    document.getElementById('apellido_materno').addEventListener('input', validarTexto);
    document.getElementById('puesto').addEventListener('input', validarTexto);
    document.getElementById('dias_trabajo').addEventListener('input', validarNumero);
    document.getElementById('horas_trabajo').addEventListener('input', validarNumero);
    document.getElementById('dias_vacaciones').addEventListener('input', validarNumero);
    document.getElementById('registroForm').addEventListener('submit', mostrarMensajeRegistro);
    document.getElementById('verLista').addEventListener('click', mostrarDataGrid);
});

function validarTexto(event) {
    const input = event.target;
    const valor = input.value;
    const regex = /^[a-zA-Z\s]*$/;
    if (!regex.test(valor)) {
        input.value = valor.replace(/[^a-zA-Z\s]/g, '');
    }
}

function validarNumero(event) {
    const input = event.target;
    const valor = input.value;
    const maxValues = {
        'dias_trabajo': 7,
        'horas_trabajo': 24,
        'dias_vacaciones': 24
    };
    const id = input.id;
    const regex = /^[0-9]*$/;
    if (!regex.test(valor)) {
        input.value = valor.replace(/[^0-9]/g, '');
    }
    if (maxValues[id] && parseInt(valor) > maxValues[id]) {
        input.value = maxValues[id];
    }
}

function calcularHoraSalida() {
    var horaEntrada = document.getElementById('hora_entrada').value;
    var horasTrabajo = document.getElementById('horas_trabajo').value;
    
    if(horaEntrada && horasTrabajo) {
        var entrada = new Date('1970-01-01T' + horaEntrada + 'Z');
        entrada.setHours(entrada.getHours() + parseInt(horasTrabajo));
        
        var horaSalida = entrada.toISOString().substr(11, 5);
        document.getElementById('hora_salida').value = horaSalida;
    }
}

function mostrarMensajeRegistro(event) {
    event.preventDefault();
    const mensaje = document.getElementById('mensajeRegistro');
    mensaje.style.display = 'block';
    setTimeout(() => {
        document.getElementById('registroForm').submit();
    }, 2000);
}

function mostrarDataGrid(event) {
    event.preventDefault();
    window.location.href = "read.php";
}
// js/scripts.js
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('registroForm').addEventListener('submit', mostrarMensajeRegistro);
    document.getElementById('verLista').addEventListener('click', mostrarDataGrid);
});

function validarTexto(input) {
    input.value = input.value.replace(/[^a-zA-Z\s]/g, '');
}

function validarNumero(input, max) {
    input.value = input.value.replace(/[^0-9]/g, '');
    if (parseInt(input.value) > max) {
        input.value = max;
    }
}
function calcularHoraSalida() {
    var horaEntrada = document.getElementById('hora_entrada').value;
    var horasTrabajo = document.getElementById('horas_trabajo').value;

    if (horaEntrada && horasTrabajo) {
        var [hora, minuto] = horaEntrada.split(':');
        var entrada = new Date();
        entrada.setHours(parseInt(hora));
        entrada.setMinutes(parseInt(minuto));

        entrada.setHours(entrada.getHours() + parseInt(horasTrabajo));

        var horaSalida = ('0' + entrada.getHours()).slice(-2) + ':' + ('0' + entrada.getMinutes()).slice(-2);
        document.getElementById('hora_salida').value = horaSalida;
    }
}

function mostrarMensajeRegistro(event) {
    event.preventDefault();
    const mensaje = document.getElementById('mensajeRegistro');
    mensaje.style.display = 'block';
    setTimeout(() => {
        document.getElementById('registroForm').submit();
    }, 2000);
}

function mostrarDataGrid(event) {
    event.preventDefault();
    window.location.href = "read.php";
}
function mostrarMensajeError() {
    const mensajeError = document.getElementById('mensajeError');
    mensajeError.style.display = 'block';
}

function ocultarMensajeError() {
    const mensajeError = document.getElementById('mensajeError');
    mensajeError.style.display = 'none';
}

document.getElementById('registroForm').addEventListener('submit', function(event) {
    if (!validarFormulario()) {
        event.preventDefault();
        mostrarMensajeError();
    }
});

function validarFormulario() {
    const nombre = document.getElementById('nombre').value;
    const apellidoPaterno = document.getElementById('apellido_paterno').value;
    const apellidoMaterno = document.getElementById('apellido_materno').value;
    const puesto = document.getElementById('puesto').value;
    const diasTrabajo = document.getElementById('dias_trabajo').value;
    const horasTrabajo = document.getElementById('horas_trabajo').value;
    const diasVacaciones = document.getElementById('dias_vacaciones').value;

    if (nombre === '' || apellidoPaterno === '' || apellidoMaterno === '' || puesto === '' || diasTrabajo === '' || horasTrabajo === '' || diasVacaciones === '') {
        return false;
    }

    // Aquí puedes agregar más validaciones si lo necesitas
    
    return true;
}

document.querySelectorAll('input').forEach(function(input) {
    input.addEventListener('input', ocultarMensajeError);
});
