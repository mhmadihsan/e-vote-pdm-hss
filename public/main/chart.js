function genereate_data(labels,datas){
    new Chart(
        document.getElementById('acquisitions'),
        {
            type: 'bar',
            options: {
                scales: {
                    x: {
                        ticks: {
                            autoSkip: false,
                            min: 0,
                            max: 100
                        },
                    }
                },
                indexAxis: 'y',
                // Elements options apply to all of the options unless overridden in a dataset
                // In this case, we are setting the border of each horizontal bar to be 2px wide
                elements: {
                    bar: {
                        borderWidth: 2,
                    }
                },
                animation: false,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        enabled: true
                    },
                    title: {
                        display: true,
                        text: 'Hasil Pemilihan Formatur Musda'
                    }
                },


            },
            data: {
                labels: labels,
                datasets: [
                    {
                        label: '# Jumlah Suara',
                        data: datas,
                        backgroundColor: poolColors(datas.length),
                        //borderColor: poolColors(datas.length),
                        borderWidth: 1
                    }
                ]
            }
        }
    );
}

$( document ).ready(function() {
    axios.get(window.location.origin+'/polling/data')
        .then(function (response) {
            genereate_data(response.data.name,response.data.data);
        })
        .catch(function (error) {
            // handle error
            console.log(error);
        })
        .finally(function () {

        });
});


function dynamicColors() {
    var r = Math.floor(Math.random() * 255);
    var g = Math.floor(Math.random() * 255);
    var b = Math.floor(Math.random() * 255);
    return "rgba(" + r + "," + g + "," + b + ", 0.5)";
}

function poolColors(a) {
    var pool = [];
    for(i = 0; i < a; i++) {
        pool.push(dynamicColors());
    }
    return pool;
}
