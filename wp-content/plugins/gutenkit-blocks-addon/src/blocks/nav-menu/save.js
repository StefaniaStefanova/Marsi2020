
import GkitIcon from '@/components/icon';
import linkGenerator from '@/helper/link-generator';
import { useBlockProps, useInnerBlocksProps } from '@wordpress/block-editor';
import classnames from 'classnames'

export default function save({ attributes }) {
	const blockProps = useBlockProps.save({
		className: classnames({
			[`hamburger-position-${attributes?.gkitMenuHamburgerIconPosition}`]: attributes?.gkitMenuHamburgerIconPosition,
			['lock-scroll-for-offcanvas']: attributes?.gkitMenuScrollLockOnOffCanvas
		}),
		id: 'block-' + attributes?.blockID,
	});

	const innerBlocksProps = useInnerBlocksProps.save({
		className: classnames('gkit-nav-menu'),
	})

	let mobileMenuLink = {};
	if (attributes?.gkitMenuMobileLogoLinkType === 'custom') {
		mobileMenuLink = linkGenerator(attributes?.gkitMenuMobileLogoCustomLink);
	} else {
		mobileMenuLink = linkGenerator({url: attributes?.gkitMenuMobileLogoLinkType});
	}

	return (
		<div {...blockProps}>
			<button className="gkit-nav-menu-hamburger gkit-menu-toggler" aria-label="hamburger-icon" type='button'>
				{
					typeof attributes?.gkitMenuMobileHumbergerIcon === 'object' && attributes?.gkitMenuMobileHumbergerIcon.hasOwnProperty('src') ? (
						<GkitIcon icon={attributes?.gkitMenuMobileHumbergerIcon} />
					) : <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" className="gkit-icon" aria-hidden="true" focusable="false"><path fillRule="evenodd" clip-rule="evenodd" d="M1 10h30c0.552 0 1-0.448 1-1s-0.448-1-1-1h-30c-0.552 0-1 0.448-1 1s0.448 1 1 1z"></path><path fillRule="evenodd" clipRule="evenodd" d="M31 15h-30c-0.552 0-1 0.448-1 1s0.448 1 1 1h30c0.552 0 1-0.448 1-1s-0.448-1-1-1z"></path><path fillRule="evenodd" clipRule="evenodd" d="M31 22h-20c-0.552 0-1 0.448-1 1s0.448 1 1 1h20c0.552 0 1-0.448 1-1s-0.448-1-1-1z"></path></svg>
				}
			</button>
			<div className="gkit-nav-menu-wrapper">
				<div className="gkit-nav-identity-panel">
					<div className="gkit-site-title">
						<a className="gkit-nav-logo" {...mobileMenuLink}>
							{
								attributes?.gkitMenuMobileLogo?.url && (
									<img src={attributes?.gkitMenuMobileLogo?.url} alt="Logo" />
								)
							}
						</a>
					</div>
					<button className="gkit-menu-close gkit-menu-toggler" type="button">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" class="gkit-icon" aria-hidden="true" focusable="false"><path fillRule="evenodd" clipRule="evenodd" d="M17.131 16.8l9.034-9.034c0.312-0.312 0.312-0.819 0-1.131s-0.819-0.312-1.131 0l-9.034 9.034-9.034-9.034c-0.312-0.312-0.819-0.312-1.131 0s-0.312 0.819 0 1.131l9.034 9.034-9.034 9.034c-0.312 0.312-0.312 0.819 0 1.131 0.156 0.156 0.361 0.234 0.566 0.234s0.409-0.078 0.566-0.234l9.034-9.034 9.034 9.034c0.156 0.156 0.361 0.234 0.566 0.234s0.409-0.078 0.566-0.234c0.312-0.312 0.312-0.819 0-1.131l-9.034-9.034z"></path></svg>
					</button>
				</div>
				<ul {...innerBlocksProps}></ul>
			</div>
			<div className="gkit-nav-menu-overlay"></div>
		</div >
	);
}
