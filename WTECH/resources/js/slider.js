
const range = document.getElementById('hs-pass-values-to-inputs');

if (range) {
noUiSlider.create(range, {
 start: [250, 1500],
 connect: true,
 range: {
     'min': 0,
     'max': 2000
 },
 tooltips: true,
 format: {
     to: function (value) {
         return Math.round(value);
     },
     from: function (value) {
         return Number(value);
     }
 }
});

const minInput = document.getElementById('hs-pass-values-to-inputs-min-target');
const maxInput = document.getElementById('hs-pass-values-to-inputs-max-target');

range.noUiSlider.on('update', (values) => {
 minInput.value = Math.round(values[0]);
 maxInput.value = Math.round(values[1]);
});

minInput.addEventListener('input', function () {
 range.noUiSlider.set([this.value, null]);
});

maxInput.addEventListener('input', function () {
 range.noUiSlider.set([null, this.value]);
});
}