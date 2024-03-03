/**
 * Selectors
 */
const listItems = document.querySelectorAll('main ol li');


/**
 * Events
 */
listItems.forEach(listItem => listItem.addEventListener('click', handleStep));


/**
 * Methods
 */
function handleStep(e)
{
    const target = e.target;
    const currentStep = target.dataset.step;
    const steps = document.querySelectorAll('.step');

    listItems.forEach(listItem => listItem.classList.remove('is-active'));
    target.classList.add('is-active');

    steps.forEach(step => {
        step.classList.remove('step--active');

        if (step.dataset.step === currentStep) {
            step.classList.add('step--active');
        }
    });
}
