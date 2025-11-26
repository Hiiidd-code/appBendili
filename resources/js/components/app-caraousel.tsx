import Autoplay from "embla-carousel-autoplay"
import {
    Carousel,
    CarouselContent,
    CarouselItem,
} from "@/components/ui/carousel-custom"

import { useEffect, useState } from "react";

const Caraousel = () => {

    //ini isinya gambar ( ͒ ु- •̫̮ – ू ͒)
    const images = [
        //jpg format
        { src: "/images/caraousel-a/img1.jpg", alt: "uh-oh ada yang salah dengan gambar1" },
        { src: "/images/caraousel-a/img2.jpg", alt: "uh-oh ada yang salah dengan gambar2" },
        { src: "/images/caraousel-a/img3.jpg", alt: "uh-oh ada yang salah dengan gambar3" },
        { src: "/images/caraousel-a/img4.jpg", alt: "uh-oh ada yang salah dengan gambar4" },
        { src: "/images/caraousel-a/img5.jpg", alt: "uh-oh ada yang salah dengan gambar5" },
        { src: "/images/caraousel-a/img6.jpg", alt: "uh-oh ada yang salah dengan gambar6" },
        { src: "/images/caraousel-a/img7.jpg", alt: "uh-oh ada yang salah dengan gambar7" },
        { src: "/images/caraousel-a/img8.jpg", alt: "uh-oh ada yang salah dengan gambar8" },
        { src: "/images/caraousel-a/img9.jpg", alt: "uh-oh ada yang salah dengan gambar9" },
        { src: "/images/caraousel-a/img10.jpg", alt: "uh-oh ada yang salah dengan gambar10" },

        //png
        { src: "/images/caraousel-a/img1.png", alt: "uh-oh ada yang salah dengan gambar1" },
        { src: "/images/caraousel-a/img2.png", alt: "uh-oh ada yang salah dengan gambar2" },
        { src: "/images/caraousel-a/img3.png", alt: "uh-oh ada yang salah dengan gambar3" },
        { src: "/images/caraousel-a/img4.png", alt: "uh-oh ada yang salah dengan gambar4" },
        { src: "/images/caraousel-a/img5.png", alt: "uh-oh ada yang salah dengan gambar5" },
        { src: "/images/caraousel-a/img6.png", alt: "uh-oh ada yang salah dengan gambar6" },
        { src: "/images/caraousel-a/img7.png", alt: "uh-oh ada yang salah dengan gambar7" },
        { src: "/images/caraousel-a/img8.png", alt: "uh-oh ada yang salah dengan gambar8" },
        { src: "/images/caraousel-a/img9.png", alt: "uh-oh ada yang salah dengan gambar9" },
        { src: "/images/caraousel-a/img10.png", alt: "uh-oh ada yang salah dengan gambar10" },


        //webp format
        { src: "/images/caraousel-a/img1.webp", alt: "uh-oh ada yang salah dengan gambar1" },
        { src: "/images/caraousel-a/img2.webp", alt: "uh-oh ada yang salah dengan gambar2" },
        { src: "/images/caraousel-a/img3.webp", alt: "uh-oh ada yang salah dengan gambar3" },
        { src: "/images/caraousel-a/img4.webp", alt: "uh-oh ada yang salah dengan gambar4" },
        { src: "/images/caraousel-a/img5.webp", alt: "uh-oh ada yang salah dengan gambar5" },
        { src: "/images/caraousel-a/img6.webp", alt: "uh-oh ada yang salah dengan gambar6" },
        { src: "/images/caraousel-a/img7.webp", alt: "uh-oh ada yang salah dengan gambar7" },
        { src: "/images/caraousel-a/img8.webp", alt: "uh-oh ada yang salah dengan gambar8" },
        { src: "/images/caraousel-a/img9.webp", alt: "uh-oh ada yang salah dengan gambar9" },
        { src: "/images/caraousel-a/img10.webp", alt: "uh-oh ada yang salah dengan gambar10" },
    ];


    const checkImage = async (url) => {
        const cache = localStorage.getItem("img_" + url);
        if (cache) return cache === "true";

        try {
            const res = await fetch(url, { method: "HEAD" });

            if (!res || !(res instanceof Response)) {
                localStorage.setItem("img_" + url, "false");
                return false;
            }

            localStorage.setItem("img_" + url, res.ok ? "true" : "false");
            return res.ok;
        } catch (err) {
            console.error("Fetch error:", err);
            localStorage.setItem("img_" + url, "false");
            return false;
        }
    };

const [validImages, setValidImages] = useState([]);

useEffect(() => {
    const load = async () => {
        const results = [];
        for (const item of images) {
            const exists = await checkImage(item.src);
            if (exists) results.push(item);
        }
        setValidImages(results);
    };
    load();
}, []);

return (
    <Carousel
        plugins={[
            Autoplay({
                delay: 2000,
            }),
        ]}

        opts={{

            align: "start",
            loop: true,
        }}>

        <CarouselContent>
            {validImages.map((img, i) => (
                <CarouselItem key={i} className="h-full flex items-center justify-center">
                    <img
                        loading="lazy"
                        decoding="async"
                        src={img.src}
                        alt={img.alt}
                        className="max-w-full max-h-full h-full object-scale-down mx-auto"
                    />
                </CarouselItem>
            ))}
        </CarouselContent>
    </Carousel>
)
}

export default Caraousel