import handleActiveClass from './Event';

window.addEventListener( 'load', () => {
	const postTabs = document.querySelectorAll( '.gkit-post-tab' );
	postTabs.forEach( ( postTab ) => {
		const eventType = postTab.getAttribute( 'data-event' );
		const tabLists = postTab.querySelectorAll( '.tab__list__item' );

		tabLists.forEach( ( tabList ) => {
			tabList.addEventListener( eventType, handleActiveClass );
		} );
	} );
} );
