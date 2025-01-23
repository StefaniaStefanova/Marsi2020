const Link = ({ children, url }) => {
	const { linkGenerator } = window.gutenkit.helpers;
	const linkAttributes = linkGenerator(url);
	return (
		<a {...linkAttributes}>
			{children}
		</a>
	)
}

export default Link