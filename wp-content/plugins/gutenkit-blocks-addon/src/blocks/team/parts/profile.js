import { handleModalEditor } from "../Event";
import Social from "./social";

const Profile = ({ attributes, isEdit, teamRef }) => {
    const { style, name, designation, description, socialProfiles, showDescription, showSocialProfiles, enablePopup } = attributes;

    let clickProps ={};
    (isEdit && enablePopup) ? clickProps.onClick = () => handleModalEditor(teamRef) : null;

    return (<>
        <div className="profile-body">
            {name && <h2 className="profile-title" {...clickProps}>{name}</h2>}
            {designation && <p className="profile-designation">{designation}</p>}
            {(showDescription && description) && <p className="profile-content">{description}</p>}
            {(style === 'hover_info' && showSocialProfiles) && (
                <div className="profile-footer">
                    <Social items={socialProfiles} />
                </div>
            )}
        </div>
        {(showSocialProfiles && style !== 'hover_info') && (
            <div className="profile-footer">
                <Social items={socialProfiles} isEdit={isEdit} />
            </div>
        )}
    </>)
}

export default Profile