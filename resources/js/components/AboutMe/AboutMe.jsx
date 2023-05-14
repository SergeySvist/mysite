import React, { useEffect, useState } from 'react';
import { baseURL } from '../../config';

const client = axios.create({baseURL});

const AboutMe = () => {
    let [info, setInfo] = useState({});
    let [cvUrl, setCvUrl] = useState();
    useEffect(()=>{
        const getInfo = async ()=>{
            const resp = await client.get('/api/info', {params: {lang: "en"}});
            setInfo(resp.data.data[0]);
        }
        getInfo();
    }, []);

    return (
        <div className='aboutMe'>
            <div className="text">
                <h1>About Me</h1>
                <p>My name is {info.name} {info.surname}.</p>
                <p>
                    {info.description && 
                        info.description.split('\n').map((item, key) => {
                        return <React.Fragment key={key}>{item}<br/></React.Fragment>
                    })}
                </p>
                <a className='btn btn-primary' href={`${baseURL}api/info/download?lang=en&file=cv`}>Download CV</a>
            </div>
            <img src={info.avatar_url} alt="" height="500px"/>
        </div>
    );
}

export default AboutMe;
