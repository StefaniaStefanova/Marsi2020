import {handleEvent} from './Event';

window.addEventListener('load', () => {
    const teams = document.querySelectorAll('.wp-block-gutenkit-team');

    teams.forEach((team) => {
        const teamPopup = team.getAttribute('data-team-popup');
        if (teamPopup === 'true') {
            handleEvent(team);
        }
    });
});