<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>4 Digitos</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <div id="app" class="container" >
        <div class="row" v-cloak>
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Adivina los 4 digitos
                            <span class="pull-right" v-show="attempts">Intentos: {{ attempts }}</span>
                        </h3>
                    </div>
                    <div class="panel-body">
                        <div v-if="isWin()">
                            <div class="well text-center">
                                <h4>Número correcto!</h4>
                                <button class="btn btn-default" @click="play()" v-text="btnStart"></button>
                            </div>
                        </div>
                        <div v-else-if="attempts > 0">
                            <p><strong>Negro</strong>: Dígito correcto, posición correcta</p>
                            <p><strong>Blanco</strong>: Dígito correcto, posición incorrecta</p>
                            <div class="well text-center" v-if="attempts > 0">
                                <ul class="list-inline" v-if="pines.length > 0">
                                    <li v-for="pin in pines">
                                        <div class="pin" :class="{black: pin, white: ! pin }"></div>
                                    </li>
                                </ul>
                            </div>
                            <form action="server.php" method="post" v-on:submit.prevent="submit">
                                <div class="well">
                                    <input v-model="number" type="text" class="form-control" placeholder="Ingresa 4 digitos" maxlength="4" required>
                                    <input v-model="code" type="hidden">
                                </div>
                                <p class="text-center">
                                    <button class="btn btn-success" type="submit" @click="update">Adivinar</button>
                                </p>
                            </form>
                        </div>
                        <div v-else>
                            <div class="well text-center">
                                <h2>* * * *</h2>
                                <button class="btn btn-default" @click="play()" v-text="btnStart"></button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/vue"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="app.js"></script>
</body>
</html>