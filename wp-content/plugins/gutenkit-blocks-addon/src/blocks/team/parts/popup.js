import Social from "./social";

const Popup = ({ attributes, isEdit }) => {
    const { closeIcon, image, memberDescription, name, designation, memberPhone, memberEmail, socialProfiles } = attributes;
    const { GkitImage, GkitIcon } = window.gutenkit.components;

    return (
        <div className="gkit-team-modal">
            <div className="gkit-team-modal-content">
                <button type="button" className="gkit-team-modal-close">
                    <GkitIcon icon={closeIcon} />
                </button>

                <div className="gkit-team-modal-body">
                    <div className="gkit-team-modal-img">
                        <GkitImage image={image} />
                    </div>
                    <div className="gkit-team-modal-info has-img">
                        {name && <h2 className="gkit-team-modal-title">{name}</h2>}
                        {designation && <p className="gkit-team-modal-position">{designation}</p>}
                        {memberDescription && <div className="gkit-team-modal-description">{memberDescription}</div>}
                        {(memberPhone || memberEmail) &&
                            <ul className="gkit-team-modal-list">
                                {memberPhone && <li><strong>Phone:</strong><a href={`tel:${memberPhone}`}>{memberPhone}</a></li>}
                                {memberEmail && <li><strong>Email:</strong><a href={`mailto:${memberEmail}`}>{memberEmail}</a></li>}
                            </ul>
                        }
                        <Social items={socialProfiles} isEdit={isEdit}/>
                    </div>
                </div>
            </div>
        </div>
    )
}

export default Popup