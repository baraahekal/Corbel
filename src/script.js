import './style.css'
import * as THREE from 'three'
import * as dat from 'lil-gui'
import gsap from 'gsap'
import { MinEquation } from 'three'
import { FontLoader } from 'three/examples/jsm/loaders/FontLoader.js'
import { TextGeometry } from 'three/examples/jsm/geometries/TextGeometry.js'
import {GLTFLoader} from 'three/examples/jsm/loaders/GLTFLoader.js'
import {FBXLoader} from 'three/examples/jsm/loaders/FBXLoader'
/**
 * Debug
 */
// const gui = new dat.GUI()
// gui.close()

// Fonts

// Navbar
let menu=document.querySelector('#menu-icon');
let navbar=document.querySelector('.navbar');

menu.onclick=()=>{
    menu.classList.toggle('bx-x');
    navbar.classList.toggle('open');
    
}

function goToPage2() {
    window.location.href = 'https://chat.openai.com/chat';
  }
  

//Smoothing

document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener("click",function(e){
        e.preventDefault();
        document.querySelector(this.getAttribute("href")).scrollIntoView({
            behavior:"smooth"
        });
    });
    
});


const fontLoader = new FontLoader()
fontLoader.load(
    '/fonts/JetBrains Mono Medium_Regular.json',
    (font) => {
        const textGeometry1 = new TextGeometry(
            'Corbel Assistant',
            {
                font: font,
                size: 0.2,
                height: 0.08,
                curveSegments: 12,
                bevelEnabled: true,
                bevelThickness: 0.02,
                bevelSize: 0.022,
                bevelOffset: 0,
                bevelSegments: 5
            }
        )

        const textGeometry2 = new TextGeometry(
            'Game',
            {
                font: font,
                size: 0.31,
                height: 0.08,
                curveSegments: 12,
                bevelEnabled: true,
                bevelThickness: 0.03,
                bevelSize: 0.02,
                bevelOffset: 0,
                bevelSegments: 5
            }
        )

        const textGeometry3 = new TextGeometry(
            'About Us',
            {
                font: font,
                size: 0.31,
                height: 0.08,
                curveSegments: 12,
                bevelEnabled: true,
                bevelThickness: 0.03,
                bevelSize: 0.02,
                bevelOffset: 0,
                bevelSegments: 5
            }
        )

        const text1 = new THREE.Mesh(textGeometry1, textMaterial)
        const text2 = new THREE.Mesh(textGeometry2, textMaterial)
        const text3 = new THREE.Mesh(textGeometry3, textMaterial)

        //text1.position.x = -2.67
        text1.position.set(-3,1.2,0)
        text1.rotation.x = -0.1
        // text1.rotation.y = -0.3

        text2.position.x = -0.2
       // text1.position.y = -4.2

        text2.position.y = -8.2
       text2.position.x = 2
        //text3.rotation.y = 0.3

        scene.add(text1)
    }
)
//

const parameters = {
    materialColor: '#e5cde4'
}

// gui
//     .addColor(parameters, 'materialColor')
//     .onChange(() =>
//     {
//         material.color.set(parameters.materialColor)
//         //particlesMaterial.color.set(parameters.materialColor)
//     })

/**
 * Base
 */
// Canvas
const canvas = document.querySelector('canvas.webgl')

// Scene
const scene = new THREE.Scene()










/**
 * Objects
 */
// Texture
const textureLoader = new THREE.TextureLoader()
const gradientTexture = textureLoader.load('textures/gradients/3.jpg')
const colorTexture = textureLoader.load('/textures/checkerboard-1024x1024.png')
const alphaTexture = textureLoader.load('/textures/door/alpha.jpg')
const minecraftTexture = textureLoader.load('/textures/Substance_Graph_BaseColor.jpg')
const heightTexture = textureLoader.load('/textures/door/height.jpg')
const normalTexture = textureLoader.load('/textures/door/normal.jpg')
const ambientOcclusionTexture = textureLoader.load('/textures/door/ambientOcclusion.jpg')
const metalnessTexture = textureLoader.load('/textures/door/metalness.jpg')
const roughnessTexture = textureLoader.load('/textures/door/roughness.jpg')

let texture = minecraftTexture

texture.wrapS = THREE.MirroredRepeatWrapping
texture.wrapT = THREE.MirroredRepeatWrapping
texture.repeat.x = 1
texture.repeat.y = 1
texture.offset.x = 1
texture.offset.y = 1
// texture.rotation = Math.PI * 0.25
texture.center.x = 1
texture.center.y = 1
texture.generateMipmaps = false
texture.minFilter = THREE.NearestFilter
texture.magFilter = THREE.NearestFilter
// Material
const material = new THREE.MeshToonMaterial({
    map: texture,
    color: parameters.materialColor,
    gradientMap: gradientTexture
})

const textMaterial = new THREE.MeshToonMaterial({
    map: texture,
    color: parameters.materialColor,
    gradientMap: gradientTexture
})



// Objects
const objectsDistance = 4
const mesh1 = new THREE.Mesh(
    new THREE.TorusGeometry(0.8, 0.28, 16, 60),
    material
)
const mesh2 = new THREE.Mesh(
    new THREE.TorusGeometry(0.8, 0.28, 16, 60),
    material
)
const mesh3 = new THREE.Mesh(
    new THREE.TorusKnotGeometry(0.8, 0.27, 100, 16),
    material
)

mesh1.position.x = 1.7
mesh2.position.x = - 1.7
mesh3.position.x = 1.5

mesh1.position.y = - objectsDistance * 0
mesh2.position.y = - objectsDistance * 1
mesh3.position.y = - objectsDistance * 2




const gltfLoader=new GLTFLoader();
let mixer = null

gltfLoader.load('/modules/robot_playground/scene.gltf',
(gltf)=>
{
    console.log(gltf)

     mixer = new THREE.AnimationMixer(gltf.scene);
    const action = mixer.clipAction(gltf.animations[0]);
    action.play();
   gltf.scene.position.set(1.7,-0.8,0)
   gltf.scene.scale.set(0.8, 0.8, 0.8)
     scene.add(gltf.scene)
     
},)




//  scene.add( mesh2, mesh3)

 const sectionMeshes = [  mesh2, mesh3 ]

 /**
 * Lights
 */
const directionalLight = new THREE.DirectionalLight('#ffffff', 1)
directionalLight.position.set(1, 1, 0)
scene.add(directionalLight)

/**
 * Particles
 */
// Geometry
const particlesCount = 600
const positions = new Float32Array(particlesCount * 3)

for(let i = 0; i < particlesCount; i++)
{
    // particles positioning
    positions[i * 3 + 0] = (Math.random() - 0.5) * 10
    positions[i * 3 + 1] = objectsDistance * 0.5 - Math.random() * 15
    positions[i * 3 + 2] = (Math.random() - 0.5) * 10
}

const particlesGeometry = new THREE.BufferGeometry()
particlesGeometry.setAttribute('position', new THREE.BufferAttribute(positions, 3))

// Material
const particlesMaterial = new THREE.PointsMaterial({
    color: parameters.materialColor,
    sizeAttenuation: textureLoader,
    size: 0.03
})

// Points
const particles = new THREE.Points(particlesGeometry, particlesMaterial)
scene.add(particles)

/**
 * Sizes
 */
const sizes = {
    width: window.innerWidth,
    height: window.innerHeight
}

window.addEventListener('resize', () =>
{
    // Update sizes
    sizes.width = window.innerWidth
    sizes.height = window.innerHeight

    // Update camera
    camera.aspect = sizes.width / sizes.height
    camera.updateProjectionMatrix()

    // Update renderer
    renderer.setSize(sizes.width, sizes.height)
    renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2))
})

/**
 * Camera
 */
// Group
const cameraGroup = new THREE.Group()
scene.add(cameraGroup)

// Base camera
const camera = new THREE.PerspectiveCamera(35, sizes.width / sizes.height, 0.1, 100)
camera.position.z = 6
cameraGroup.add(camera)

/**
 * Renderer
 */
const renderer = new THREE.WebGLRenderer({
    canvas: canvas,
    alpha: true
})
renderer.setSize(sizes.width, sizes.height)
renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2))

/**
 * Scroll
 */
let scrollY = window.scrollY
let currentSection = 0

window.addEventListener('scroll', () =>
{
    scrollY = window.scrollY
    const newSection = Math.round(scrollY / sizes.height)

    if(newSection != currentSection)
    {
        currentSection = newSection

        gsap.to(
            sectionMeshes[currentSection].rotation,
            {
                duration: 2.5,
                ease: 'power2.inOut',
                x: '+=4',
                y: '+=1',
                z: '+=1.5'
            }
        )
    }
})

/**
 * Cursor
 */
const cursor = {}
cursor.x = 0
cursor.y = 0

window.addEventListener('mousemove', (event) =>
{
    cursor.x = event.clientX / sizes.width - .5
    cursor.y = event.clientY / sizes.height - .5
})

/**
 * Animate
 */
const clock = new THREE.Clock()
let previousTime = 0


const tick = () =>
{
    // for different screens fps
    const elapsedTime = clock.getElapsedTime()
    const deltaTime = elapsedTime - previousTime
    previousTime = elapsedTime
   if (mixer !== null)
   {
    mixer.update(deltaTime)
   }
    // Animate camera
    camera.position.y = - scrollY / sizes.height * objectsDistance

    const parallaxX = cursor.x * 0.5
    const parallaxY = - cursor.y * 0.5
    cameraGroup.position.x += (parallaxX - cameraGroup.position.x) * 5 * deltaTime
    cameraGroup.position.y += (parallaxY - cameraGroup.position.y) * 5 * deltaTime

    // Animate meshes
    for(const mesh of sectionMeshes)
    {
        mesh.rotation.x += deltaTime * 0.3
        mesh.rotation.y += deltaTime * 0.12
    }

    // Render
renderer.render(scene, camera)

    // Call tick again on the next frame
    window.requestAnimationFrame(tick)
}

tick()