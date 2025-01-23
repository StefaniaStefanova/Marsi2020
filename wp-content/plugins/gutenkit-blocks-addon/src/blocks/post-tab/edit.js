import { useBlockProps } from '@wordpress/block-editor';
import Settings from './settings';
import classNames from 'classnames';
import Header from './parts/header';
import Body from './parts/body';
import { useEffect, useState } from '@wordpress/element';
import apiFetch from '@wordpress/api-fetch';


export default function Edit( { attributes, setAttributes, advancedControl } ) {
	const { GkitStyle } = window.gutenkit.components;
	const { useDeviceType } = window.gutenkit.helpers;
	const blockProps = useBlockProps();
	const device = useDeviceType();
	const wrapperProps = {
		className: classNames( 'gkit-post-tab', 'post--tab' ),
		'data-event': attributes.eventType,
	};
	const [posts, setPosts] = useState([]);

	useEffect(() => {
		if(attributes?.selectedCatagories.length === 0) {
			apiFetch({ path: `/wp/v2/categories?per_page=15` })
            .then((response) => {
				const catagories = response.map((category) => {
					return {
						label: category?.name,
						value: category?.id
					}
				})
				setPosts(catagories)
            })
            .catch((error) => {
                console.error(error)
            })
		} else {
			setPosts(attributes?.selectedCatagories)
		}
    }, [attributes?.selectedCatagories])

	return (
		<>
			<GkitStyle blocksCSS={ attributes?.blocksCSS } />

			<Settings
				attributes={ attributes }
				setAttributes={ setAttributes }
				device={ device }
				advancedControl={ advancedControl }
			/>

			<div { ...blockProps }>
				<div { ...wrapperProps }>
					<div className="tab-header">
						<div className="tab__list">
							{ posts.map(
								( category, index ) => (
									<Header
										key={ index }
										category={ category }
										index={ index }
										eventType={ attributes.eventType }
									/>
								)
							) }
						</div>
					</div>
					<div className="gkit--tab__post__details tab-content">
						{ posts.map(
							( category, index ) => (
								<Body
									key={ index }
									category={ category }
									attributes={ attributes }
									index={ index }
								/>
							)
						) }
					</div>
				</div>
			</div>
		</>
	);
}
