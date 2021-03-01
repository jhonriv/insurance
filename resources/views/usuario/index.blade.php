@extends('layouts._layout')

@section('contenido')
    <div class="container-fluid resalt" style="width:95%;">
        <div class="container-fluid" style="width:99%;">
            <div class="div-inline">
                <span class="glyphicon-background">
                    <img src="/images/usuarios.png" class="glyphicon-image" />
                </span>
                <h3 class="h3-inline">&nbsp;User List</h3>
            </div>
            <div class="create-intable">
                <input type="button" id="create_new" class="btn btn-primary" 
                style="padding:12px" value="Create new User" />
            </div>
            <div id="div-hidden" style="display:none;">
                <hr />
                <form id="form_user" class="form-floating" method="POST" action="/usuarios">
                    @csrf
                    <input type="hidden" id="method" name="_method">
                    <div class="row mar-bottom">
                        <div class="form-floating col">
                            <input type="email" class="form-control _popover" id="email" name="email"
                            placeholder="name@example.com" required
                            data-bs-toggle="popover" title="Email Address" 
                            data-bs-content="Please, write with format example: email@email.com">
                            <label for="email">Email address</label>
                        </div>
                        <div class="form-floating col">
                            <input type="password" class="form-control _popover" id="password" name="password"
                            placeholder="Password"
                            data-bs-toggle="popover" title="Password" 
                            data-bs-content="The password must be between 8 to 16 characters (_ _ _ _ _ _ _ _'); 
                            A number (0 - 9); A capital letter (A - Z); and a special character (# $ % + *)">
                            <label for="password">Password</label>
                        </div>
                        <div class="form-floating col">
                            <input type="text" class="form-control _popover" id="nombre" name="nombre"
                            placeholder="Name" maxlength="100" required
                            data-bs-toggle="popover" title="Name" 
                            data-bs-content="Write your name"
                            onkeypress="return solotext(event)">
                            <label for="nombre">Name</label>
                        </div>
                        <div class="form-floating col">
                            <input type="text" class="form-control _popover" id="apellido" name="apellido"
                            placeholder="Lastname" maxlength="100" required
                            data-bs-toggle="popover" title="Lastname" 
                            data-bs-content="Write your lastname"
                            onkeypress="return solotext(event)">
                            <label for="apellido">Lastname</label>
                        </div>
                    </div>
                    <div class="row mar-bottom">
                        <div class="form-floating col">
                            <input type="text" class="form-control _popover" id="dni" name="dni" 
                            placeholder="Passport" maxlength="11" required
                            data-bs-toggle="popover" title="Passport or DNI" 
                            data-bs-content="Write your number of identification">
                            <label for="dni">Passport</label>
                        </div>
                        <div class="form-floating col">
                            <input type="text" class="form-control _popover date" id="birthday" name="birthday"
                            placeholder="Birthday" required
                            data-date-format="YYYY/MM/DD"
                            data-bs-toggle="popover" title="Date of Birth" 
                            data-bs-content="Write your date of birth">
                            <label for="birthday">Birthday</label>
                        </div>
                        <div class="form-floating col">
                            <input type="text" class="form-control _popover" id="phone" name="phone"
                            placeholder="Phone" maxlength="11" required
                            data-bs-toggle="popover" title="Phone" 
                            data-bs-content="Write your number of phone">
                            <label for="phone">Phone</label>
                        </div>
                        <div class="form-floating col">
                            <select class="form-select" id="nivel" name="nivel" required>
                                <option selected="selected" disabled="disabled">Select Level</option>
                                <option value="0">Administrator</option>
                                <option value="1">User</option>
                            </select>
                        </div>

                    </div>
                    <div class="row mar-bottom">
                        <div class="form-floating col">
                            <select class="form-select" id="pais" name="pais" required>
                                <option selected="selected" disabled="disabled">Select Country</option>
                                @foreach ($paises as $pais)
                                    <option value="{{$pais->id}}">{{$pais->nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-floating col">
                            <select class="form-select" id="estado" name="estado" required>
                                <option selected="selected" disabled="disabled">Select State</option>
                            </select>
                        </div>
                        <div class="form-floating col">
                            <select class="form-select" id="ciudad" name="ciudad" required>
                                <option selected="selected" disabled="disabled">Select City</option>
                            </select>
                        </div>
                        <div class="form-floating col">
                            <div class="row alto100">
                                <div class="col alto100" style="padding-right:5px;">
                                    <input type="button" id="cancel" class="btn btn-primary col-12" 
                                    value="Cancel" style="height:100%;font-size:large"/>
                                </div>
                                <div class="col alto100" style="padding-left:5px;">
                                    <input type="submit" id="save" class="btn btn-success col-12"
                                    value="Registry" style="height:100%;font-size:large"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <hr />
            </div>
            <div>
            <table class="table table-striped">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Email</th>
                        <th scope="col">Name</th>
                        <th scope="col">Lastname</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Passport</th>
                        <th scope="col">Date of Birth</th>
                        <th scope="col">Age</th>
                        <th scope="col">Country</th>
                        <th scope="col">State</th>
                        <th scope="col">City</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $con = 1;
                        $hoy = new DateTime();
                    @endphp
                    @foreach($usuarios as $usu)
                    <tr data-id="{{ $usu->id }}">
                        <td scope="col">{{ $con++ }}</td>
                        <td scope="col">{{ $usu->email }}</td>
                        <td scope="col">{{ $usu->nombre }}</td>
                        <td scope="col">{{ $usu->apellido }}</td>
                        <td scope="col">{{ $usu->telefono }}</td>
                        <td scope="col">{{ $usu->dni }}</td>
                        <td scope="col">{{ $usu->birthday }}</td>
                        <td scope="col">{{\Carbon\Carbon::parse($usu->birthday)->age}}</td>
                        <td scope="col">{{ $usu->pais }}</td>
                        <td scope="col">{{ $usu->estado }}</td>
                        <td scope="col">{{ $usu->ciudad }}</td>
                        <td scope="col">
                            <button class="btn btn-primary btn_edit">Edit</button>
                            <button class="btn btn-danger btn_del">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
        </div>
    </div>

    {!! Form::open(['route' => ['usuarios.getestados', ':ID_PAIS'], 'id' => 'form_estados']) !!}
    {!! Form::close() !!}
    {!! Form::open(['route' => ['usuarios.getciudades', ':ID_PAIS' ], 'id' => 'form_ciudades']) !!}
    {!! Form::close() !!}
    {!! Form::open(['route' => ['usuarios.getedit', ':ID_USER' ], 'id' => 'form_edit']) !!}
    {!! Form::close() !!}
    {!! Form::open(['/usuarios', 'method' => 'DELETE', 'id' => 'form_delete']) !!}
    {!! Form::close() !!}

    <script>
        $("#phone").mask('(000) 0000-0000');
        $("#dni").mask('00000000000');
        $(function(){
            $(".date").datetimepicker({
            showTodayButton: true,
            locale: "es"
            });
        });
        
        $(document).ready(function () {
            var IP_options = {
                onKeyPress: function (text, event, currentField, options) {
                    if (text) {
                        var today = new Date();
                        var dateArray = text.split("-");
                        var lastValue = dateArray[dateArray.length - 1];
                        if (text.length < 5){
                            if (lastValue != "" && parseInt(lastValue) > today.getFullYear()) {
                                dateArray[dateArray.length - 1] = today.getFullYear();
                                var resultingValue = dateArray.join("-");
                                currentField.text(resultingValue).val(resultingValue);
                            }
                        }
                        if ((text.length > 5) & (text.length < 8)){
                            if (lastValue != "" && parseInt(lastValue) > 12) {
                                dateArray[dateArray.length - 1] = '12';
                                var resultingValue = dateArray.join("-");
                                currentField.text(resultingValue).val(resultingValue);
                            }
                        }
                        if (text.length > 8){
                            if (lastValue != "" && parseInt(lastValue) > 31) {
                                dateArray[dateArray.length - 1] = '31';
                                var resultingValue = dateArray.join("-");
                                var date = new Date(resultingValue);
                                if (date > today)
                                    currentField.text(FechaActual(today)).val(FechaActual(today));
                                else
                                    currentField.text(FechaActual(date)).val(FechaActual(date));
                            }
                        }
                    }
                },
                translation: {
                    'Z': {
                        pattern: /[0-9]/, optional: true
                    }
                }
            };

            $('#birthday').mask('000Z-0Z-0Z', IP_options);


            var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
            var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
                return new bootstrap.Popover(popoverTriggerEl)
            })

            $("._popover").focus(function(e){
                $(this).popover('show');
            });

            $("._popover").blur(function(e){
                if ($(this).attr('id') == 'password'){
                    var pass = $(this);
                    var passValue = pass.val();
                    if ((passValue.length < 8) || (passValue.length > 16)){
                        pass.addClass('is-invalid');
                    } else {
                        var values = passValue.split("");
                        var patronMA =/[A-Z]+/;
                        var patroNU =/[0-9]+/;
                        var patronES = /[#$%+*]+/;
                        var valid = [false, false, false];
                        for (var i = 0; i < values.length; i++) {
                            if (patronMA.test(values[i]))
                                valid[0] = true;

                            if (patroNU.test(values[i]))
                                valid[1] = true;

                            if (patronES.test(values[i]))
                                valid[2] = true;
                        }
                        if ((valid[0]) & (valid[1]) & (valid[2]))
                            pass.removeClass('is-invalid');
                        else
                            pass.addClass('is-invalid');
                    }
                }
                $(this).popover('hide');
            });

            $("#create_new").click(function(e){
                limpiaform();
                $("#save").val("Registry");
                $("#form_user").attr('action', '/usuarios');
                $("#method").val('POST');
                $("#div-hidden").slideDown();
            });

            $(".btn_edit").click(function(e){
                limpiaform();

                var row = $(this).parents('tr');
                var id = row.data('id');
                var form = $("#form_edit");
                var url = form.attr('action').replace(':ID_USER', id);
                var data = form.serialize();

                $.post(url, data, function(data){
                    var json = data[0];
                    $("#email").val(json.email);
                    $("#nombre").val(json.nombre);
                    $("#apellido").val(json.apellido);
                    $("#dni").val(json.dni);
                    $("#birthday").val(json.birthday);
                    $("#phone").val(json.telefono);
                    $("#nivel").val(json.nivel);
                    $("#pais").val(json.id_pais);
                    buscaestado(json.id_pais, json.id_estado, json.id_ciudad);
                });

                $("#save").val("Update");
                $("#form_user").prop('action', '/usuarios/'+id);
                $("#method").val('PUT');

                $("#div-hidden").slideDown();
            });

            $(".btn_del").click(function(e){
                var row = $(this).parents('tr');
                var id = row.data('id');
                var form = $("#form_delete");
                var url = form.attr('action').concat('/'+id);
                var data = form.serialize();

                $.post(url, data, function(data){
                    if (data == "OK")
                        row.fadeOut();
                });
            });

            $("#cancel").click(function(e){
                $("#div-hidden").slideUp();
            });

            $('#pais').change(function(){
                var id = $(this).val();
                buscaestado(id);
            });

            $('#estado').change(function(){
                var id = $(this).val();
                buscaciudad(id);
            });


            $("#form_user").submit(function(e){
                e.preventDefault();




                
                var form = $("#form_user");
                var url = form.attr('action');
                var data = form.serialize();
                
                $.post(url, data, function(data){
                    limpiaform();
                    $("#div-hidden").slideUp();
                    location.reload();
                });

            });
        });

        function FechaActual(esteMomento) {
            var dianum = esteMomento.getDate();
            var mesnum = esteMomento.getMonth() + 1;
            if (dianum < 10) dianum = '0' + dianum;
            if (mesnum < 10) mesnum = '0' + mesnum;
            var fecha = esteMomento.getFullYear() + "-" + mesnum + "-" + dianum;
            return fecha;
        }

        function solotext(e){
            tecla = (document.all) ? e.keyCode : e.which;

            if ((tecla==8) || (tecla == 9) || (tecla == 32)|| (tecla == 192)){
                return true;
            }
            patron =/[A-Za-zñáéíóúÁÉÍÓÚäëïöüÄËÏÖÜ]+/;
            tecla_final = String.fromCharCode(tecla);
            return patron.test(tecla_final);
        }

        function solonum(e){
            tecla = (document.all) ? e.keyCode : e.which;
            if ((tecla==8) || (tecla == 9) || (tecla == 32)){
                return true;
            }

            patron =/[0-9-.]/;
            tecla_final = String.fromCharCode(tecla);
            
            return patron.test(tecla_final);
        }

        function limpiaform(){
            $("#form_user")[0].reset();
            $("#estado").empty();
            $("#ciudad").empty();
            var estados = '<option value="">Select State</option>';
            $("#estado").append(estados);
            var ciudades = '<option value="">Select City</option>';
            $("#ciudad").append(ciudades);
        }

        function buscaestado(id_pais, id_estado, id_ciudad){
            var estado = $('#estado');
            var ciudad = $('#ciudad');
            var form = $("#form_estados");
            var url = form.attr('action').replace(':ID_PAIS', id_pais);
            var data = form.serialize();
            estado.empty();
            ciudad.empty();

            $.post(url, data, function(data){
                
                var estados = '<option value="">Select State</option>';
                for (var i=0; i<data.length;i++)
                    estados+='<option value="'+data[i].id+'">'+data[i].nombre+'</option>';

                estado.append(estados);
                var ciudades = '<option value="">Select City</option>';
                ciudad.append(ciudades);

                if (id_estado != undefined){
                    $('#estado option').each(function(){
                        if ($(this).val() == id_estado){
                            $(this).attr('selected', true);
                            buscaciudad($(this).val(), id_ciudad);
                        }
                    });
                }
            });
        } 

        function buscaciudad(id_estado, id_ciudad){
            var ciudad = $('#ciudad');
            var form = $("#form_ciudades");
            var url = form.attr('action').replace(':ID_PAIS', id_estado);
            var data = form.serialize();
            ciudad.empty();

            $.post(url, data, function(data){
                var ciudades = '<option value="">Select City</option>';
                for (var i=0; i<data.length;i++)
                    ciudades+='<option value="'+data[i].id+'">'+data[i].nombre+'</option>';

                ciudad.append(ciudades);

                if (id_ciudad != undefined){
                    $('#ciudad option').each(function(){
                        if ($(this).val() == id_ciudad){
                            $(this).attr('selected', true);
                        }
                    });
                }
            });
        }        
    </script>
@endsection