const chart = document.querySelector("#chart").getContext('2d');

// create a new instance
new Chart(chart, {
    type: 'line',
    data: {
        labels: ['23:30:18.184', '23:30:18.323', '23:30:18.416', '23:30:18.555', '23:30:18.650', '23:30:18.744', '23:30:18.883', '23:30:18.976', '23:30:19.115', '23:30:19.209', '23:30:19.302', '23:30:19.442'],

        datasets: [
            {
                label: 'Arus',
                data: [0.004, 0.008, 0.004, 0.012, 0.012, 0.012, 0.012, 0.012, 0.012, 0.016, 0.008, 0.036],
                borderColor: 'red',
                borderWidth: 2
            },
            {
                label: 'Kecepatan',
                data: [31500, 299076, 401506, 567843, 33572, 48874, 39973, 39973, 76543, 31164, 46578],
                borderColor: 'green',
                borderWidth: 2
            }
        ]
    },
    option: {
        responsive: true
    }
})

/* ================= SHOW OR HIDE SIDEBAR ====================== */
const menuBtn = document.querySelector('#menu-btn');
const closeBtn = document.querySelector('#close-btn');
const sidebar = document.querySelector('aside');

menuBtn.addEventListener('click', () => {
    sidebar.style.display = 'block';
})

closeBtn.addEventListener('click', () => {
    sidebar.style.display = 'none';
})

/* ================= CHANGE THEME ====================== */
// const themeBtn = document.querySelector('.theme-btn');

// themeBtn = addEventListener('click', () => {
//     document.body.classList.toggle('dark-theme');

//     themeBtn.querySelector('span:first-child').classList.toggle('active');
//     themeBtn.querySelector('span:last-child').classList.toggle('active');
// })