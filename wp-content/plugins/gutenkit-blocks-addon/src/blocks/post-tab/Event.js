const handleActiveClass = ( e ) => {
	const currentElement = e.target;
	const currentElementData = currentElement.getAttribute( 'data-category-id' );
	const wrapper = currentElement.closest( '.gkit-post-tab' );
	const parentElement = currentElement.closest( '.tab__list' ).childNodes;
	const siblings = Array.from( parentElement ).filter(( node ) => node.nodeType === Node.ELEMENT_NODE && node !== currentElement);

	siblings.map( ( element ) => element.classList.remove( 'active' ) );
	currentElement.classList.add( 'active' );

	wrapper.querySelectorAll( '.tab-item' ).forEach( ( element ) => {
		const elementData = element.getAttribute( 'data-category-id' );

		if ( elementData === currentElementData ) {
			element.classList.add( 'active' );
		} else {
			element.classList.remove( 'active' );
		}
	} );
};

export default handleActiveClass;
