import { __ } from '@wordpress/i18n';
import './editor.scss';
import Settings from './settings';
import useDeviceType from '@/helper/useDeviceType';
import classnames from 'classnames'
import {
	useBlockProps,
	useInnerBlocksProps,
} from '@wordpress/block-editor';
import { select } from '@wordpress/data';
import { useEffect, useState, useRef } from '@wordpress/element';
import apiFetch from '@wordpress/api-fetch';
import NavMenuAppenderButton from './appender-button';
import GkitIcon from '@/components/icon';
import { useMergeRefs } from '@wordpress/compose';
import linkGenerator from '@/helper/link-generator';

export default function Edit({ attributes, setAttributes, clientId, advancedControl, isSelected }) {
	const [navMenuTemplates, setNavMenuTemplates] = useState([]);
	const components = window.gutenkit.components;
	const GkitStyle = components.GkitStyle;
	const CustomAppender = () => <NavMenuAppenderButton rootClientId={clientId} />;
	const { getBlockOrder, getBlockNamesByClientId, getBlockRootClientId } = select('core/block-editor');
	const blockRootClientId = getBlockRootClientId(clientId);
	const blockRootName = getBlockNamesByClientId(blockRootClientId);
	const isNestedMenu = blockRootName && blockRootName[0] === 'gutenkit/nav-menu-item';
	const hasChildBlocks = getBlockOrder(clientId).length > 0;
	const navMenuRef = useRef();
	const device = useDeviceType();
	const blockProps = useBlockProps({
		className: classnames({
			[`hamburger-position-${attributes?.gkitMenuHamburgerIconPosition}`]: attributes?.gkitMenuHamburgerIconPosition,
			['lock-scroll-for-offcanvas']: attributes?.gkitMenuScrollLockOnOffCanvas
		}),
		ref: useMergeRefs([navMenuRef])
	});

	useEffect(() => {
		apiFetch({
			path: '/wp/v2/pages?per_page=5&parent=0'
		}).then((response) => {
			if (response && response.length > 0) {
				const templates = response.map((page) => {
					let title = page?.title?.rendered;
					let url = page?.link;
					let id = page?.id;
					let type = page?.type;
					return ["gutenkit/nav-menu-item", {
						gkitMenuItemType: "dynamic",
						gkitMenuItemDynamicItem: {
							title: title,
							url: url,
							id: id,
							type: type,
							label: title,
							value: id
						}
					}];
				});
				isNestedMenu ? setNavMenuTemplates([]) : setNavMenuTemplates(templates);
			}
		}).catch((error) => {
			console.error(error);
		})
	}, []);

	useEffect(() => {
		const navMenu = navMenuRef.current;
		if (navMenu) {
			const closeButton = navMenu.querySelector('.gkit-menu-close');
			const overlay = navMenu.querySelector('.gkit-nav-menu-overlay');

			closeButton.addEventListener('click', () => {
				navMenu.classList.remove('active');
				setTimeout(() => {
					const menuWrapper = navMenu.querySelector('.gkit-nav-menu-wrapper');
					if (menuWrapper?.classList.contains('is-sidebar-open')) {
						menuWrapper.classList.remove('is-sidebar-open');
					}
				}, 800)
			})

			overlay.addEventListener('click', () => {
				navMenu.classList.remove('active');
				setTimeout(() => {
					const menuWrapper = navMenu.querySelector('.gkit-nav-menu-wrapper');
					if (menuWrapper?.classList.contains('is-sidebar-open')) {
						menuWrapper.classList.remove('is-sidebar-open');
					}
				}, 800)
			})

			navMenu.addEventListener('click', (e) => {
				if (e.target.classList.contains('gkit-nav-menu-submenu-arrow')) {
					const link = e.target.closest('.gkit-nav-menu-link');
					link?.parentElement.classList.toggle('show-submenu');
				}

				if (e.target.parentElement.classList.contains('gkit-nav-menu-submenu-arrow')) {
					const link = e.target.closest('.gkit-nav-menu-link');
					link?.parentElement.classList.toggle('show-submenu');
				}

				if (e.target.parentElement.parentElement.classList.contains('gkit-nav-menu-submenu-arrow')) {
					const link = e.target.closest('.gkit-nav-menu-link');
					link?.parentElement.classList.toggle('show-submenu');
				}
			})
		}
	}, []);

	const innerBlocksProps = useInnerBlocksProps({
		className: classnames('gkit-nav-menu', {})
	}, {
		allowedBlocks: ['gutenkit/nav-menu-item'],
		template: navMenuTemplates,
		renderAppender: isSelected || !hasChildBlocks ? CustomAppender : false
	});

	const handleHamburger = () => {
		navMenuRef.current.classList.toggle('active');
		const menuWrapper = navMenuRef.current.querySelector('.gkit-nav-menu-wrapper');
		menuWrapper.classList.add('is-sidebar-open');
	}

	let mobileMenuLink = {};
	if (attributes?.gkitMenuMobileLogoLinkType === 'custom') {
		mobileMenuLink = linkGenerator(attributes?.gkitMenuMobileLogoCustomLink);
	} else {
		mobileMenuLink = linkGenerator({url: attributes?.gkitMenuMobileLogoLinkType});
	}

	return (
		<>
			<GkitStyle
				blocksCSS={attributes?.blocksCSS}
			/>

			<Settings
				attributes={attributes}
				setAttributes={setAttributes}
				device={device}
				advancedControl={advancedControl}
			/>

			<div {...blockProps}>
				<button className="gkit-nav-menu-hamburger gkit-menu-toggler" aria-label="hamburger-icon" type='button' onClick={handleHamburger}>
					{
						typeof attributes?.gkitMenuMobileHumbergerIcon === 'object' && attributes?.gkitMenuMobileHumbergerIcon.hasOwnProperty('src') ? (
							<GkitIcon icon={attributes?.gkitMenuMobileHumbergerIcon} />
						) : <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" className="gkit-icon" aria-hidden="true" focusable="false"><path fillRule="evenodd" clipRule="evenodd" d="M1 10h30c0.552 0 1-0.448 1-1s-0.448-1-1-1h-30c-0.552 0-1 0.448-1 1s0.448 1 1 1z"></path><path fillRule="evenodd" clipRule="evenodd" d="M31 15h-30c-0.552 0-1 0.448-1 1s0.448 1 1 1h30c0.552 0 1-0.448 1-1s-0.448-1-1-1z"></path><path fillRule="evenodd" clipRule="evenodd" d="M31 22h-20c-0.552 0-1 0.448-1 1s0.448 1 1 1h20c0.552 0 1-0.448 1-1s-0.448-1-1-1z"></path></svg>
					}
				</button>
				<div className="gkit-nav-menu-wrapper">
					<div className="gkit-nav-identity-panel">
						<div className="gkit-site-title">
							<a className="gkit-nav-logo" {...mobileMenuLink} onClick={e => e.preventDefault()}>
								{
									attributes?.gkitMenuMobileLogo?.url && (
										<img src={attributes?.gkitMenuMobileLogo?.url} alt="Logo" />
									)
								}
							</a>
						</div>
						<button className="gkit-menu-close gkit-menu-toggler" type="button">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" className="gkit-icon" aria-hidden="true" focusable="false"><path fillRule="evenodd" clipRule="evenodd" d="M17.131 16.8l9.034-9.034c0.312-0.312 0.312-0.819 0-1.131s-0.819-0.312-1.131 0l-9.034 9.034-9.034-9.034c-0.312-0.312-0.819-0.312-1.131 0s-0.312 0.819 0 1.131l9.034 9.034-9.034 9.034c-0.312 0.312-0.312 0.819 0 1.131 0.156 0.156 0.361 0.234 0.566 0.234s0.409-0.078 0.566-0.234l9.034-9.034 9.034 9.034c0.156 0.156 0.361 0.234 0.566 0.234s0.409-0.078 0.566-0.234c0.312-0.312 0.312-0.819 0-1.131l-9.034-9.034z"></path></svg>
						</button>
					</div>
					<ul {...innerBlocksProps}></ul>
				</div>
				<div className="gkit-nav-menu-overlay"></div>
			</div>
		</>
	);
}
