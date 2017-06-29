new Vue({
    el: '#app',
    data: {
        code: '',
        number: '',
        attempts: 0,
        pines: [],
        btnStart: 'Jugar'
    },
    methods: {
        submit: function () {
            axios.get('server.php', {
                params: {code: this.code, number: this.number}
            }).then(function (response) {
                console.log(response.data);

                this.pines = [];
                response.data.forEach(function(color) {
                    if (color == 'N') {
                        this.pines.push(true);
                    } else if (color == 'B') {
                        this.pines.push(false);
                    }
                }.bind(this));

            }.bind(this));
        },
        isWin: function () {
            var sum = this.pines.reduce(function (a, b) {
                return a + b;
            }, 0);

            return sum == 4;
        },
        play: function () {
            this.btnStart = 'Jugar otra vez';
            this.generateCode();
            this.attempts = 12;
            this.pines = [];
            this.number = '';
        },
        update: function () {
            this.attempts--;
        },
        generateCode: function () {
            axios.get('generate-code.php')
                .then(function (response) {
                    this.code = response.data;
                }.bind(this));
        }
    }
});