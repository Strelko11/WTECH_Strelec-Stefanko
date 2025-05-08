document.addEventListener("DOMContentLoaded", function () {
    const range = document.getElementById('hs-pass-values-to-inputs');
    const minInput = document.getElementById('hs-pass-values-to-inputs-min-target');
    const maxInput = document.getElementById('hs-pass-values-to-inputs-max-target');

    if (!range || !minInput || !maxInput) return;


    const minValue = parseInt(minInput.value) || 0;
    const maxValue = parseInt(maxInput.value) || 2000;

    noUiSlider.create(range, {
        start: [minValue, maxValue],
        connect: true,
        range: {
            min: 0,
            max: 2000
        },
        tooltips: true,
        format: {
            to: value => Math.round(value),
            from: value => Number(value)
        }
    });


    range.noUiSlider.on('update', (values) => {
        minInput.value = Math.round(values[0]);
        maxInput.value = Math.round(values[1]);
    });


    minInput.addEventListener('change', function () {
        range.noUiSlider.set([this.value, null]);
    });

    maxInput.addEventListener('change', function () {
        range.noUiSlider.set([null, this.value]);
    });
});
