from PIL import Image
import os
import numpy
import shutil

im = Image.open("search/search.jpg")#print(im.format, im.size, im.mode)
searchHis = im.histogram()
numpySearchHis = numpy.array(searchHis)

imageLibs = []#保存本地图片库所有图片路径
for dir in os.listdir('image-libs'):
    for file in os.listdir('image-libs/' + dir):
        if os.path.splitext(file)[1]=='.jpg':
            imageLibs.append('image-libs/' + dir + '/' + file)

imageLibsDistances = {}.fromkeys(imageLibs)

for libImage in imageLibs:
    numpyMatchHis = numpy.array(Image.open(libImage).histogram())
    distance = numpy.linalg.norm(numpySearchHis - numpyMatchHis)
    imageLibsDistances[libImage] = distance

sortedImageLibsDistances = sorted(imageLibsDistances.items(), key=lambda item:item[1])
top10 = sortedImageLibsDistances[0:10]

i = 0
for imageTuple in top10:
    shutil.copyfile(imageTuple[0], 'result/' + str(i) + '.jpg')
    i = i+1

exit(0)