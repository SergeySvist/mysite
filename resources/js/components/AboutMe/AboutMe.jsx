import React, { useEffect, useState } from 'react';
import { baseURL } from '../../config';

const client = axios.create({baseURL});

const AboutMe = () => {
    let [info, setInfo] = useState({});

    useEffect(()=>{
        const getInfo = async ()=>{
            const resp = await client.get('/api/info', {params: {lang: "en"}});
            setInfo(resp.data.data[0]);
        }
        getInfo();
    }, []);
    return (
        <div className='aboutMe '>
            <div className="text">
                <h1>About Me</h1>
                <p>My name is {info.name} {info.surname}.</p>
                <p>{info.description}</p>
            </div>
            <img src={info.avatar_url} alt="" height="400px"/>
        </div>
    );
}

export default AboutMe;
