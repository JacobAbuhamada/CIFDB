# # Thesis Analysis Code

#load libraries
import pandas as pd
import numpy as np
import matplotlib.pyplot as plt
import seaborn as sns
import scipy.stats as stats
import sklearn

stroops = pd.read_csv("stroops.csv")
vectors = pd.read_csv("vectors.csv")
profile = pd.read_csv("profile.csv")
vectors.describe()
stroops.describe()
profile.describe()
vectorstroop = pd.read_csv("vectorstroop.csv")
VS = vectorstroop.dropna()
dimensions = vectors[['X', 'Y', 'Z', 'SoS']].copy()

pairplot = sns.pairplot(dimensions, hue="SoS")
pairplot.fig.suptitle("Pairplot of 4 Experiential Dimensions", y=1.05, fontsize = 18)

scatterXY = sns.jointplot(x="X", y="Y", 
              kind = "scatter", data = vectors)
scatterXY.fig.suptitle("Scatterplot of X and Y", y=1.05, fontsize = 18)
plt.show()

scatterXZ = sns.jointplot(x="X", y="Z", 
              kind = "scatter", data = vectors)
scatterXZ.fig.suptitle("Scatterplot of X and Z", y=1.05, fontsize = 18)
plt.show()

scatterZY = sns.jointplot(x="Z", y="Y", 
              kind = "scatter", data = vectors)
scatterZY.fig.suptitle("Scatterplot of Z and Y", y=1.05, fontsize = 18)
plt.show()

scatterZSoS = sns.jointplot(x="Z", y="SoS", 
              kind = "scatter", data = vectors)
scatterZSoS.fig.suptitle("Scatterplot of Z and SoS", y=1.05, fontsize = 18)
plt.show()

ax = sns.regplot(x="Z", y="SoS", data=vectors)

scatterYSoS = sns.jointplot(x="Y", y="SoS", 
              kind = "scatter", data = vectors)
scatterYSoS.fig.suptitle("Scatterplot of Y and SoS", y=1.05, fontsize = 18)
plt.show()

scatterXSoS = sns.jointplot(x="X", y="SoS", 
              kind = "scatter", data = vectors)
scatterXSoS.fig.suptitle("Scatterplot of X and SoS", y=1.05, fontsize = 18)
plt.show()

XYkde = sns.jointplot(data=vectors, x="X", y="Y", kind="kde")
XYkde.fig.suptitle("Kernel Density Estimation of X and Y", y=1.05, fontsize = 18)

lat = vectors["X"]
long = vectors["Y"]
ax = sns.kdeplot(lat, long, cmap="Blues", shade=True, shade_lowest=False, cut=0)
plt.title('X-Y Heatmap', fontsize = 18)

XYhist = sns.jointplot(data=vectors, x="X", y="Y", kind="hist")
XYhist.fig.suptitle("Histogram of X and Y", y=1.05, fontsize = 18)

cgram_4D = sns.heatmap(dimensions.corr(), cmap="YlGnBu", annot = True)
plt.title('Correlogram of Experiential Dimensions', fontsize = 18, y = 1.05)
sns.set(rc = {'figure.figsize':(6,6)})
plt.show()

VS_dimensions = vectorstroop[['X', 'Y', 'Z', 'SoS', 'OffTime+OnTime', 'Ontime minus Offtime']].copy()
sns.heatmap(VS_dimensions.corr(), cmap="YlGnBu", annot = True)
plt.title('Correlogram of Experiential Dimensions and Stroop', fontsize = 16, y = 1.05, x = .55)
sns.set(rc = {'figure.figsize':(7,6)})
plt.show()

ax = sns.regplot(x="SoS", y="OffTime+OnTime", data=VS_dimensions)
ax = sns.regplot(x="X", y="Z", data=vectors)
ax = sns.regplot(x="X", y="OffTime+OnTime", data=VS)
ax = sns.regplot(x="X", y="Ontime minus Offtime", data=VS)

lat = VS["Z"]
long = VS["Y"]
ax = sns.kdeplot(lat, long, cmap="Blues", shade=True, shade_lowest=False, cut=0)
plt.title("Heatmap of Z-Y (Circumplex) Vectors", fontsize = 18, y = 1.04)
plt.xlim([-5, 5])
plt.ylim([0, 10])

#scatterplot of all recorded vectors for all subjects w/ centroid
fig, ax = plt.subplots(figsize=(8,8))
ax.scatter(vectors['X'], vectors['Y'], c=vectors['SoS'])
ax.set_xlabel('X (Executive-Cognitive Functioning)', fontsize = 15)
ax.set_ylabel('Y (Intensity of Exp/Activation)', fontsize = 15)
plt.title('Projection of Sense of Self Over X-Y Plane of All Experiences', fontsize = 18, y = 1.04)

#centroid point (red)
X_mean = vectors['X'].mean()
Y_mean = vectors['Y'].mean()
ax.plot(X_mean, Y_mean, 'ro', markersize=16)
    
x = vectors['X']
y = vectors['Y']
z = vectors['SoS']
plt.tricontour(x, y, z, 14, linewidths=0.2, colors='k')
plt.tricontourf(x, y, z, 14)    
    
plt.show()

#scatterplot of all recorded vectors for all subjects w/ centroid
fig, ax = plt.subplots(figsize=(8,8))
ax.scatter(vectors['X'], vectors['Z'], c=vectors['SoS'])
ax.set_xlabel('X (Executive-Cognitive Functioning)', fontsize = 15)
ax.set_ylabel('Z (Affective Valence)', fontsize = 15)
plt.title('Projection of Sense of Self Over X-Z Plane of All Experiences', fontsize = 18, y = 1.04)

#centroid point (red)
X_mean = vectors['X'].mean()
Z_mean = vectors['Z'].mean()
ax.plot(X_mean, Z_mean, 'ro', markersize=16)
    
x = vectors['X']
y = vectors['Z']
z = vectors['SoS']
plt.tricontour(x, y, z, 12, linewidths=0.2, colors='k')
plt.tricontourf(x, y, z, 12)       
plt.show()

#scatterplot of all recorded vectors for all subjects w/ centroid
fig, ax = plt.subplots(figsize=(8,8))
ax.scatter(vectors['X'], vectors['Y'], c=vectors['Z'])
ax.set_xlabel('X (Executive-Cognitive Functioning)', fontsize = 15)
ax.set_ylabel('Y (Intensity of Exp/Activation)', fontsize = 15)
plt.title('Projection of Valence Over X-Y Plane of All Experiences', fontsize = 18, y = 1.04)

#centroid point (red)
X_mean = vectors['X'].mean()
Y_mean = vectors['Y'].mean()
ax.plot(X_mean, Y_mean, 'ro', markersize=16)
    
x = vectors['X']
y = vectors['Y']
z = vectors['Z']
plt.tricontour(x, y, z, 10, linewidths=0.2, colors='k')
plt.tricontourf(x, y, z, 10)       
plt.show()

VS_dimensions.describe()
dimensions.describe()

#distributions of dimensions
ax = sns.boxplot(data=dimensions)
plt.title("Boxplots of Experiential Dimensions", fontsize = 18, y = 1.04)
plt.ylabel("Participant Scores", fontsize = 15)

sns.histplot(data=vectors, x="SoS", discrete=True, shrink=0.8)
plt.title("Histogram of SoS Response Counts", fontsize = 18, y = 1.04)
plt.xlabel("Sense of Self Response (1-5)", fontsize = 15)
plt.ylabel("Number of Vectors With SoS Response", fontsize = 15)
plt.show()

#take average vector values for each participant
centroids = vectors.groupby('ID').mean()

centroid_dims = centroids[['X', 'Y', 'Z', 'SoS']].copy()
sns.heatmap(centroid_dims.corr(), cmap="YlGnBu", annot = True)
sns.set(rc = {'figure.figsize':(6,6)})
plt.title("Correlogram of Dimensions (Centroids)", fontsize = 16, y = 1.04, x = 0.57)
plt.show()

centroid_dims.describe()

pairplot_centroids = sns.pairplot(centroid_dims, hue="SoS")
pairplot_centroids.fig.suptitle("Pairplot of 4 Experiential Dimensions", y=1.05, fontsize = 18)

ax = sns.regplot(x="Z", y="SoS", data=centroid_dims)
ax = sns.regplot(x="X", y="Z", data=centroid_dims)

#scatterplot of all participant centroids
fig, ax = plt.subplots(figsize=(8,8))
ax.scatter(centroid_dims['X'], centroid_dims['Y'], c=centroid_dims['SoS'])
ax.set_xlabel('X (Executive-Cognitive Functioning)', fontsize = 15)
ax.set_ylabel('Y (Intensity of Exp/Activation)', fontsize = 15) 
plt.title("Projection of SoS Over X-Y Plane of All Experiences (Centroids)", fontsize = 17, y = 1.04)
plt.xlim([-5, 5])
plt.ylim([0, 10])

#centroid of centroids point (red)
X_mean = centroid_dims['X'].mean()
Y_mean = centroid_dims['Y'].mean()
ax.plot(X_mean, Y_mean, 'ro', markersize=16)
    
x = centroid_dims['X']
y = centroid_dims['Y']
z = centroid_dims['SoS']
plt.tricontour(x, y, z, 15, linewidths=0.2, colors='k')
plt.tricontourf(x, y, z, 15)      
plt.show()

plt.title("Heatmap of X-Y Centroids", fontsize = 18, y = 1.04)
lat = centroid_dims["X"]
long = centroid_dims["Y"]
ax = sns.kdeplot(lat, long, cmap="Blues", shade=True, shade_lowest=False, cut=0)
plt.xlim([-5, 5])
plt.ylim([0, 10])

lat = centroid_dims["X"]
long = centroid_dims["Z"]
ax = sns.kdeplot(lat, long, cmap="Blues", shade=True, shade_lowest=False, cut=0)
plt.title("Heatmap of X-Z Centroids", fontsize = 18, y = 1.04)
plt.xlim([-5, 5])
plt.ylim([-5, 5])

lat = centroid_dims["Z"]
long = centroid_dims["Y"]
ax = sns.kdeplot(lat, long, cmap="Blues", shade=True, shade_lowest=False, cut=0)
plt.title("Heatmap of Z-Y (Circumplex) Centroids", fontsize = 18, y = 1.04)
plt.xlim([-5, 5])
plt.ylim([0, 10])

lat = centroid_dims["X"]
long = centroid_dims["SoS"]
ax = sns.kdeplot(lat, long, cmap="Blues", shade=True, shade_lowest=False, cut=0)
plt.title("Heatmap of X-SoS Centroids", fontsize = 18, y = 1.04)
plt.xlim([-5, 5])
plt.ylim([1, 5])

lat = centroid_dims["Z"]
long = centroid_dims["SoS"]
ax = sns.kdeplot(lat, long, cmap="Blues", shade=True, shade_lowest=False, cut=0)
plt.title("Heatmap of Z-SoS Centroids", fontsize = 18, y = 1.04)
plt.xlim([-5, 5])
plt.ylim([1, 5])

#distributions of dimensions (centroids)
ax = sns.boxplot(data=centroid_dims)
plt.title("Boxplots of Experiential Dimensions (Centroids)", fontsize = 18, y = 1.04)
plt.ylabel("Participant Scores", fontsize = 15)

#3D plot
from mpl_toolkits import mplot3d
fig = plt.figure()
ax = plt.axes(projection='3d')
ax.scatter3D(vectors['X'], vectors['Y'], vectors['Z'], c=vectors['SoS'])
ax.set_xlabel('x')
ax.set_ylabel('y')
ax.set_zlabel('z')

# 3D Heatmap in Python using matplotlib
  
# to make plot interactive 
get_ipython().run_line_magic('matplotlib', '')
  
# importing required libraries
from mpl_toolkits.mplot3d import Axes3D
from pylab import *
  
# creating a dummy dataset
x = vectors['X']
y = vectors['Y']
z = vectors['Z']
colo = vectors['SoS']
  
# creating figures
fig = plt.figure(figsize=(10, 10))
ax = fig.add_subplot(111, projection='3d')
  
# setting color bar
color_map = cm.ScalarMappable(cmap=cm.gray)
color_map.set_array(colo)
  
# creating the heatmap
img = ax.scatter(x, y, z, marker='s',
                 s=200, color = 'gray')
plt.colorbar(color_map)
  
# adding title and labels
ax.set_title("3D Heatmap")
ax.set_xlabel('X-axis')
ax.set_ylabel('Y-axis')
ax.set_zlabel('Z-axis')
  
# displaying plot
plt.show()

# # Lexical Analysis
wordlist = pd.Series(np.concatenate([x.split() for x in vectors.description])).value_counts()
wordlist2 = vectors.description.str.split(expand=True).stack().value_counts()
pd.DataFrame(data=wordlist)
wordlist.describe()

#load lexical dataframes
coffee = pd.read_csv("coffee_vecs.csv")
relationships = pd.read_csv("relationship_vecs.csv")
relax = pd.read_csv("relax_vecs.csv")
tired = pd.read_csv("tired_vecs.csv")
work = pd.read_csv("work_vecs.csv")

coffee.describe()
relationships.describe()
relax.describe()
work.describe()
tired.describe()

X = coffee["X"]
Y = coffee["Y"]
ax = sns.kdeplot(X, Y, cmap="Blues", shade=True, shade_lowest=False, cut=0)
plt.rcParams["figure.figsize"] = (5,5)
plt.title("X-Y Heatmap of 'Coffee' Vectors", fontsize = 18, y = 1.04)
plt.xlim([-5, 5])
plt.ylim([0, 10])

X = coffee["Z"]
Y = coffee["SoS"]
ax = sns.kdeplot(X, Y, cmap="Blues", shade=True, shade_lowest=False, cut=0)
plt.rcParams["figure.figsize"] = (5,5)
plt.title("Z-SoS Heatmap of 'Coffee' Vectors", fontsize = 18, y = 1.04)
plt.xlim([-5, 5])
plt.ylim([1, 5])

coffee_dims = coffee[['X', 'Y', 'Z', 'SoS']].copy()
pairplot_coffee = sns.pairplot(coffee_dims, hue="SoS")
pairplot_coffee.fig.suptitle("Pairplot of 4 Experiential Dimensions (Coffee)", y=1.05, fontsize = 18)

X = tired["X"]
Y = tired["Y"]
plt.title("X-Y Heatmap of 'Tired' Vectors", fontsize = 18, y = 1.04)
plt.xlim([-5, 5])
plt.ylim([0, 10])
ax = sns.kdeplot(X, Y, cmap="Blues", shade=True, shade_lowest=False, cut=0)
plt.rcParams["figure.figsize"] = (5,5)

X = tired["Z"]
Y = tired["SoS"]
ax = sns.kdeplot(X, Y, cmap="Blues", shade=True, shade_lowest=False, cut=0)
plt.rcParams["figure.figsize"] = (5,5)
plt.title("Z-SoS Heatmap of 'Tired' Vectors", fontsize = 18, y = 1.04)
plt.xlim([-5, 5])
plt.ylim([1, 5])

tired_dims = tired[['X', 'Y', 'Z', 'SoS']].copy()
pairplot_tired = sns.pairplot(tired_dims, hue="SoS")
pairplot_tired.fig.suptitle("Pairplot of 4 Experiential Dimensions (Tired)", y=1.05, fontsize = 18)

X = relax["X"]
Y = relax["Y"]
ax = sns.kdeplot(X, Y, cmap="Blues", shade=True, shade_lowest=False, cut=0)
plt.title("X-Y Heatmap of 'Relax' Vectors", fontsize = 18, y = 1.04)
plt.xlim([-5, 5])
plt.ylim([0, 10])
plt.rcParams["figure.figsize"] = (5,5)

X = relax["Z"]
Y = relax["SoS"]
ax = sns.kdeplot(X, Y, cmap="Blues", shade=True, shade_lowest=False, cut=0)
plt.rcParams["figure.figsize"] = (5,5)
plt.title("Z-SoS Heatmap of 'Relax' Vectors", fontsize = 18, y = 1.04)
plt.xlim([-5, 5])
plt.ylim([1, 5])

relax_dims = relax[['X', 'Y', 'Z', 'SoS']].copy()
pairplot_relax = sns.pairplot(relax_dims, hue="SoS")
pairplot_relax.fig.suptitle("Pairplot of 4 Experiential Dimensions (Relax)", y=1.05, fontsize = 18)

X = work["X"]
Y = work["Y"]
ax = sns.kdeplot(X, Y, cmap="Blues", shade=True, shade_lowest=False, cut=0)
plt.rcParams["figure.figsize"] = (5,5)
plt.title("X-Y Heatmap of 'Work' Vectors", fontsize = 18, y = 1.04)
plt.xlim([-5, 5])
plt.ylim([0, 10])

X = work["Z"]
Y = work["SoS"]
ax = sns.kdeplot(X, Y, cmap="Blues", shade=True, shade_lowest=False, cut=0)
plt.rcParams["figure.figsize"] = (5,5)
plt.title("Z-SoS Heatmap of 'Work' Vectors", fontsize = 18, y = 1.04)
plt.xlim([-5, 5])
plt.ylim([1, 5])

work_dims = work[['X', 'Y', 'Z', 'SoS']].copy()
pairplot_work = sns.pairplot(work_dims, hue="SoS")
pairplot_work.fig.suptitle("Pairplot of 4 Experiential Dimensions (Work)", y=1.05, fontsize = 18)

X = relationships["X"]
Y = relationships["Y"]
ax = sns.kdeplot(X, Y, cmap="Blues", shade=True, shade_lowest=False, cut=0)
plt.rcParams["figure.figsize"] = (5,5)
plt.title("X-Y Heatmap of 'Relationship' Vectors", fontsize = 18, y = 1.04)
plt.xlim([-5, 5])
plt.ylim([0, 10])

X = relationships["Z"]
Y = relationships["SoS"]
ax = sns.kdeplot(X, Y, cmap="Blues", shade=True, shade_lowest=False, cut=0)
plt.rcParams["figure.figsize"] = (5,5)
plt.title("Z-SoS Heatmap of 'Relationship' Vectors", fontsize = 18, y = 1.04)
plt.xlim([-5, 5])
plt.ylim([1, 5])

relationship_dims = relationships[['X', 'Y', 'Z', 'SoS']].copy()
pairplot_relationship = sns.pairplot(relationship_dims, hue="SoS")
pairplot_relationship.fig.suptitle("Pairplot of 4 Experiential Dimensions (Relational Terms)", y=1.05, fontsize = 18)

# # Demographic Analysis
profile_clean = pd.read_csv("profile_clean.csv")

profile_clean = profile_clean.loc[:, ~profile_clean.columns.isin(['ID'])]

sns.heatmap(profile_clean.corr(), cmap="YlGnBu", annot = True)
plt.title("Correlogram of Participant Profile Features", fontsize = 18, y = 1.01)
plt.show()

## Code source: https://www.geeksforgeeks.org/convert-birth-date-to-age-in-pandas/
from datetime import datetime, date
dob = {'DOB': profile["DOB"]}
df = pd.DataFrame(data = dob)
def age(born):
    born = datetime.strptime(born, "%Y-%m-%d").date()
    today = date.today()
    return today.year - born.year - ((today.month, 
                                      today.day) < (born.month, 
                                                    born.day)) 
df['Age'] = df['DOB'].apply(age)
display(df)
##

df.sort_values(by=['Age'])

ages_hist = plt.hist(df['Age'], bins=50)
plt.title("Histogram of Participant Ages", fontsize = 18, y = 1.03)
plt.xlabel("Participant Age", fontsize = 15)
plt.ylabel("Number of Participants", fontsize = 15)
plt.rcParams["figure.figsize"] = (6,4)

#Comparison of Experiences by Gender (cis vs trans)
trans_vectors = centroids.query('ID in [10, 15, 16, 18, 34, 49]')
cis_vectors = centroids.query('ID not in [10, 15, 16, 18, 34, 49]')
cis_vectors.describe()
trans_vectors.describe()

#find variance for each group
print(np.var(trans_vectors), np.var(cis_vectors))

#perform two sample t-test with equal variances
stats.ttest_ind(a=trans_vectors, b=cis_vectors, equal_var=True)

#perform two sample t-test with equal variances
stats.ttest_ind(a=trans_vectors, b=cis_vectors, equal_var=False)

trans_vecs = vectors.query('ID in [10, 15, 16, 18, 34, 49]')
trans_dims = trans_vecs[['X', 'Y', 'Z', 'SoS']].copy()
pairplot_trans = sns.pairplot(trans_dims, hue="SoS")
pairplot_trans.fig.suptitle("Pairplot of 4 Experiential Dimensions (transgender participants)", y=1.05, fontsize = 18)

cis_vecs = vectors.query('ID not in [10, 15, 16, 18, 34, 49]')
cis_dims = cis_vecs[['X', 'Y', 'Z', 'SoS']].copy()
pairplot_cis = sns.pairplot(cis_dims, hue="SoS")
pairplot_cis.fig.suptitle("Pairplot of 4 Experiential Dimensions (cisgender participants)", y=1.05, fontsize = 18)

#Comparison of Experiences by Mental Illness (has(15)/might have(3)/doesn't have(8))
no_diagnoses = centroids.query('ID in [16,24,27,30,31,33,42,43]')
no_diagnoses.describe()
diagnoses = centroids.query('ID not in [16,24,27,30,31,33,42,43]')
diagnoses.describe()

#find variance for each group
print(np.var(no_diagnoses), np.var(diagnoses))

#perform two sample t-test with equal variances
stats.ttest_ind(a=diagnoses, b=no_diagnoses, equal_var=True)

#perform two sample t-test with equal variances
stats.ttest_ind(a=diagnoses, b=no_diagnoses, equal_var=False)

#GAD as point of comparison
GAD = centroids.query('ID in [3,6,10,18,20,25,28,34,37,41,49]')
no_GAD = centroids.query('ID not in [3,6,10,18,20,25,28,34,37,41,49]')
GAD.describe()
no_GAD.describe()

#find variance for each group
print(np.var(GAD), np.var(no_GAD))

#perform two sample t-test with equal variances
stats.ttest_ind(a=GAD, b=no_GAD, equal_var=True)

#perform two sample t-test with equal variances
stats.ttest_ind(a=GAD, b=no_GAD, equal_var=False)

GAD_vectors = vectors.query('ID in [3,6,10,18,20,25,28,34,37,41,49]')
GAD_vectors = GAD_vectors[['X', 'Y', 'Z', 'SoS']].copy()

no_GAD_vectors = vectors.query('ID not in [3,6,10,18,20,25,28,34,37,41,49]')
no_GAD_vectors = no_GAD_vectors[['X', 'Y', 'Z', 'SoS']].copy()

#find variance for each group
print(np.var(GAD_vectors), np.var(no_GAD_vectors))

#perform two sample t-test with equal variances
stats.ttest_ind(a=GAD_vectors, b=no_GAD_vectors, equal_var=True)

X = GAD_vectors["X"]
Y = GAD_vectors["Y"]
plt.title("X-Y Heatmap of 'GAD' Vectors", fontsize = 18, y = 1.04)
plt.xlim([-5, 5])
plt.ylim([0, 10])
ax = sns.kdeplot(X, Y, cmap="Blues", shade=True, shade_lowest=False, cut=0)
plt.rcParams["figure.figsize"] = (5,5)

X = GAD["X"]
Y = GAD["Y"]
plt.title("X-Y Heatmap of 'GAD' Centroids", fontsize = 18, y = 1.04)
plt.xlim([-5, 5])
plt.ylim([0, 10])
ax = sns.kdeplot(X, Y, cmap="Blues", shade=True, shade_lowest=False, cut=0)
plt.rcParams["figure.figsize"] = (5,5)

X = GAD_vectors["Z"]
Y = GAD_vectors["SoS"]
plt.title("Z-SoS Heatmap of 'GAD' Vectors", fontsize = 18, y = 1.04)
plt.xlim([-5, 5])
plt.ylim([1, 5])
ax = sns.kdeplot(X, Y, cmap="Blues", shade=True, shade_lowest=False, cut=0)
plt.rcParams["figure.figsize"] = (5,5)

X = GAD["Z"]
Y = GAD["SoS"]
plt.title("Z-SoS Heatmap of 'GAD' Centroids", fontsize = 18, y = 1.04)
plt.xlim([-5, 5])
plt.ylim([1, 5])
ax = sns.kdeplot(X, Y, cmap="Blues", shade=True, shade_lowest=False, cut=0)
plt.rcParams["figure.figsize"] = (5,5)

GAD_dims = GAD_vectors[['X', 'Y', 'Z', 'SoS']].copy()
pairplot_GAD = sns.pairplot(GAD_dims, hue="SoS")
pairplot_GAD.fig.suptitle("Pairplot of 4 Experiential Dimensions (GAD)", y=1.05, fontsize = 18)

X = no_GAD_vectors["X"]
Y = no_GAD_vectors["Y"]
plt.title("X-Y Heatmap of 'Non-GAD' Vectors", fontsize = 18, y = 1.04)
plt.xlim([-5, 5])
plt.ylim([0, 10])
ax = sns.kdeplot(X, Y, cmap="Blues", shade=True, shade_lowest=False, cut=0)
plt.rcParams["figure.figsize"] = (5,5)

X = no_GAD["X"]
Y = no_GAD["Y"]
plt.title("X-Y Heatmap of 'Non-GAD' Centroids", fontsize = 18, y = 1.04)
plt.xlim([-5, 5])
plt.ylim([0, 10])
ax = sns.kdeplot(X, Y, cmap="Blues", shade=True, shade_lowest=False, cut=0)
plt.rcParams["figure.figsize"] = (5,5)

X = no_GAD_vectors["Z"]
Y = no_GAD_vectors["SoS"]
plt.title("Z-SoS Heatmap of 'Non-GAD' Vectors", fontsize = 18, y = 1.04)
plt.xlim([-5, 5])
plt.ylim([1, 5])
ax = sns.kdeplot(X, Y, cmap="Blues", shade=True, shade_lowest=False, cut=0)
plt.rcParams["figure.figsize"] = (5,5)

X = no_GAD["Z"]
Y = no_GAD["SoS"]
plt.title("Z-SoS Heatmap of 'Non-GAD' Centroids", fontsize = 18, y = 1.04)
plt.xlim([-5, 5])
plt.ylim([1, 5])
ax = sns.kdeplot(X, Y, cmap="Blues", shade=True, shade_lowest=False, cut=0)
plt.rcParams["figure.figsize"] = (5,5)

no_GAD_dims = no_GAD_vectors[['X', 'Y', 'Z', 'SoS']].copy()
pairplot_no_GAD = sns.pairplot(no_GAD_dims, hue="SoS")
pairplot_no_GAD.fig.suptitle("Pairplot of 4 Experiential Dimensions (non-GAD)", y=1.05, fontsize = 18)

#depression
depression = centroids.query('ID in [10,15,18,20,25,34,37,40,41,49]')
no_depression = centroids.query('ID not in [10,15,18,20,25,34,37,40,41,49]')
depression.describe()
no_depression.describe()

#find variance for each group
print(np.var(depression), np.var(no_depression))

#perform two sample t-test with equal variances
stats.ttest_ind(a=depression, b=no_depression, equal_var=True)

depression_vectors = vectors.query('ID in [3,6,10,18,20,25,28,34,37,41,49]')
depression_vectors = depression_vectors[['X', 'Y', 'Z', 'SoS']].copy()
no_depression_vectors = vectors.query('ID not in [3,6,10,18,20,25,28,34,37,41,49]')
no_depression_vectors = no_depression_vectors[['X', 'Y', 'Z', 'SoS']].copy()

#find variance for each group
print(np.var(depression_vectors), np.var(no_depression_vectors))

#perform two sample t-test with equal variances
stats.ttest_ind(a=depression_vectors, b=no_depression_vectors, equal_var=True)

X = depression_vectors["X"]
Y = depression_vectors["Y"]
plt.title("X-Y Heatmap of 'Depression' Vectors", fontsize = 18, y = 1.04)
plt.xlim([-5, 5])
plt.ylim([0, 10])
ax = sns.kdeplot(X, Y, cmap="Blues", shade=True, shade_lowest=False, cut=0)
plt.rcParams["figure.figsize"] = (5,5)

X = depression["X"]
Y = depression["Y"]
plt.title("X-Y Heatmap of 'Depression' Centroids", fontsize = 18, y = 1.04)
plt.xlim([-5, 5])
plt.ylim([0, 10])
ax = sns.kdeplot(X, Y, cmap="Blues", shade=True, shade_lowest=False, cut=0)
plt.rcParams["figure.figsize"] = (5,5)

X = no_depression_vectors["X"]
Y = no_depression_vectors["Y"]
plt.title("X-Y Heatmap of 'Non-Depression' Vectors", fontsize = 18, y = 1.04)
plt.xlim([-5, 5])
plt.ylim([0, 10])
ax = sns.kdeplot(X, Y, cmap="Blues", shade=True, shade_lowest=False, cut=0)
plt.rcParams["figure.figsize"] = (5,5)

X = no_depression["X"]
Y = no_depression["Y"]
plt.title("X-Y Heatmap of 'Non-Depression' Centroids", fontsize = 18, y = 1.04)
plt.xlim([-5, 5])
plt.ylim([0, 10])
ax = sns.kdeplot(X, Y, cmap="Blues", shade=True, shade_lowest=False, cut=0)
plt.rcParams["figure.figsize"] = (5,5)

X = depression["Z"]
Y = depression["SoS"]
plt.title("Z-SoS Heatmap of 'Depression' Centroids", fontsize = 18, y = 1.04)
plt.xlim([-5, 5])
plt.ylim([1, 5])
ax = sns.kdeplot(X, Y, cmap="Blues", shade=True, shade_lowest=False, cut=0)
plt.rcParams["figure.figsize"] = (5,5)

X = depression_vectors["Z"]
Y = depression_vectors["SoS"]
plt.title("Z-SoS Heatmap of 'Depression' Vectors", fontsize = 18, y = 1.04)
plt.xlim([-5, 5])
plt.ylim([1, 5])
ax = sns.kdeplot(X, Y, cmap="Blues", shade=True, shade_lowest=False, cut=0)
plt.rcParams["figure.figsize"] = (5,5)

X = no_depression["Z"]
Y = no_depression["SoS"]
plt.title("Z-SoS Heatmap of 'Non-Depression' Centroids", fontsize = 18, y = 1.04)
plt.xlim([-5, 5])
plt.ylim([1, 5])
ax = sns.kdeplot(X, Y, cmap="Blues", shade=True, shade_lowest=False, cut=0)
plt.rcParams["figure.figsize"] = (5,5)

X = no_depression_vectors["Z"]
Y = no_depression_vectors["SoS"]
plt.title("Z-SoS Heatmap of 'Non-Depression' Vectors", fontsize = 18, y = 1.04)
plt.xlim([-5, 5])
plt.ylim([1, 5])
ax = sns.kdeplot(X, Y, cmap="Blues", shade=True, shade_lowest=False, cut=0)
plt.rcParams["figure.figsize"] = (5,5)

#PTSD
PTSD = centroids.query('ID in [15,18,19,20,34,39,40,49]')
no_PTSD = centroids.query('ID not in [15,18,19,20,34,39,40,49]')
PTSD.describe()
no_PTSD.describe()

#find variance for each group
print(np.var(PTSD), np.var(no_PTSD))

#perform two sample t-test with equal variances
stats.ttest_ind(a=PTSD, b=no_PTSD, equal_var=True)

profile_w_centroids = pd.read_csv("profile_clean_w_centroids.csv")
profile_w_centroids = profile_w_centroids.drop(['ID'], axis=1)

sns.heatmap(profile_w_centroids.corr(), cmap="YlGnBu", annot = True)
sns.set(rc = {'figure.figsize':(22,17)})
plt.title("Correlogram of Participant Profile Features And Centroids", fontsize = 18, y = 1.01)
plt.show()

# # Analyzing Individuals - 3 Exemplary Participants

#Analyzing 16
Participant_16 = pd.read_csv("16.csv")
P16_dims = Participant_16[['X', 'Y', 'Z', 'SoS']].copy()
P16_dims.describe()

sns.heatmap(P16_dims.corr(), cmap="YlGnBu", annot = True)
sns.set(rc = {'figure.figsize':(6,6)})
plt.title("Correlogram of Participant 16's Vectors", fontsize = 18, y = 1.04)
plt.show()

pairplot16 = sns.pairplot(P16_dims, hue="SoS")
pairplot16.fig.suptitle("Pairplot of 4 Experiential Dimensions (P16)", y=1.05, fontsize = 18)

#scatterplot of all recorded vectors for P16 w/ centroid
fig, ax = plt.subplots(figsize=(8,8))
ax.scatter(P16_dims['X'], P16_dims['Y'], c=P16_dims['SoS'])
ax.set_xlabel('X (Executive-Cognitive Functioning)', fontsize = 15)
ax.set_ylabel('Y (Intensity of Exp/Activation)', fontsize = 15)
plt.title("Projection of SoS Over X-Y Plane P16's Experiences", fontsize = 18, y = 1.04)

#centroid point (red)
X_mean = P16_dims['X'].mean()
Y_mean = P16_dims['Y'].mean()
ax.plot(X_mean, Y_mean, 'ro', markersize=16)
    
x = P16_dims['X']
y = P16_dims['Y']
z = P16_dims['SoS']
plt.tricontour(x, y, z, 14, linewidths=0.2, colors='k')
plt.tricontourf(x, y, z, 14)       
plt.show()

lat = P16_dims["X"]
long = P16_dims["Y"]
ax = sns.kdeplot(lat, long, cmap="Blues", shade=True, shade_lowest=False, cut=0)
plt.title("Heatmap of P16's Vectors", fontsize = 18, y = 1.04)
plt.xlim([-5, 5])
plt.ylim([0, 10])

#Analyzing 20
Participant_20 = pd.read_csv("20.csv")
P20_dims = Participant_20[['X', 'Y', 'Z', 'SoS']].copy()
P20_dims.describe()

sns.heatmap(P20_dims.corr(), cmap="YlGnBu", annot = True)
sns.set(rc = {'figure.figsize':(6,6)})
plt.title("Correlogram of P20's Vectors", fontsize = 18, y = 1.04)
plt.show()

pairplot20 = sns.pairplot(P20_dims, hue="SoS")
pairplot20.fig.suptitle("Pairplot of 4 Experiential Dimensions (P20)", y=1.05, fontsize = 18)

#scatterplot of all recorded vectors for P20 w/ centroid
fig, ax = plt.subplots(figsize=(8,8))
ax.scatter(P20_dims['X'], P20_dims['Y'], c=P20_dims['SoS'])
ax.set_xlabel('X (Executive-Cognitive Functioning)', fontsize = 15)
ax.set_ylabel('Y (Intensity of Exp/Activation)', fontsize = 15)
plt.title("Projection of SoS Over X-Y Plane P20's Experiences", fontsize = 17, y = 1.04)
plt.xlim([-5, 5])
plt.ylim([0, 10])

#centroid point (red)
X_mean = P20_dims['X'].mean()
Y_mean = P20_dims['Y'].mean()
ax.plot(X_mean, Y_mean, 'ro', markersize=16)
    
x = P20_dims['X']
y = P20_dims['Y']
z = P20_dims['SoS']
plt.tricontour(x, y, z, 14, linewidths=0.2, colors='k')
plt.tricontourf(x, y, z, 14)       
plt.show()

lat = P20_dims["X"]
long = P20_dims["Y"]
ax = sns.kdeplot(lat, long, cmap="Blues", shade=True, shade_lowest=False, cut=0)
plt.title("Heatmap of P20's Vectors", fontsize = 18, y = 1.04)
plt.xlim([-5, 5])
plt.ylim([0, 10])

#Analyzing 25
Participant_25 = pd.read_csv("25.csv")
P25_dims = Participant_25[['X', 'Y', 'Z', 'SoS']].copy()
P25_dims.describe()

sns.heatmap(Participant_25.corr(), cmap="YlGnBu", annot = True)
sns.set(rc = {'figure.figsize':(9,7)})
plt.title("Correlogram of P25's Vectors", fontsize = 18, y = 1.04)
plt.show()

sns.heatmap(P25_dims.corr(), cmap="YlGnBu", annot = True)
sns.set(rc = {'figure.figsize':(6,6)})
plt.title("Correlogram of P25's Vectors", fontsize = 18, y = 1.04)
plt.show()

pairplot25 = sns.pairplot(P25_dims, hue="SoS")
pairplot25.fig.suptitle("Pairplot of 4 Experiential Dimensions (P25)", y=1.05, fontsize = 18)

#scatterplot of all recorded vectors for P25 w/ centroid
fig, ax = plt.subplots(figsize=(8,8))
ax.scatter(P25_dims['X'], P25_dims['Y'], c=P25_dims['SoS'])
ax.set_xlabel('X (Executive-Cognitive Functioning)', fontsize = 15)
ax.set_ylabel('Y (Intensity of Exp/Activation)', fontsize = 15)
plt.title("Projection of SoS Over X-Y Plane P25's Experiences", fontsize = 18, y = 1.04)
plt.xlim([-5, 5])
plt.ylim([0, 10])

#centroid point (red)
X_mean = P25_dims['X'].mean()
Y_mean = P25_dims['Y'].mean()
ax.plot(X_mean, Y_mean, 'ro', markersize=16)
    
x = P25_dims['X']
y = P25_dims['Y']
z = P25_dims['SoS']
plt.tricontour(x, y, z, 14, linewidths=0.2, colors='k')
plt.tricontourf(x, y, z, 14)     
plt.show()

lat = P25_dims["X"]
long = P25_dims["Y"]
ax = sns.kdeplot(lat, long, cmap="Blues", shade=True, shade_lowest=False, cut=0)
plt.title("Heatmap of P25's Vectors", fontsize = 18, y = 1.04)
plt.xlim([-5, 5])
plt.ylim([0, 10])

#Everyone else as control
control = vectorstroop[vectorstroop["ID"] != 16]
control = control[control["ID"] != 20]
control = control[control["ID"] != 25]
control_dims = control[['X', 'Y', 'Z', 'SoS']].copy()
control_dims.describe()

sns.heatmap(control_dims.corr(), cmap="YlGnBu", annot = True)
sns.set(rc = {'figure.figsize':(6,6)})
plt.title("Correlogram of Control Group's Vectors", fontsize = 18, y = 1.04, x = .55)
plt.show()

pairplot_control = sns.pairplot(control_dims, hue="SoS")
pairplot_control.fig.suptitle("Pairplot of 4 Experiential Dimensions (Controls)", y=1.05, fontsize = 18)

#scatterplot of all recorded vectors for controls w/ centroid
fig, ax = plt.subplots(figsize=(8,8))
ax.scatter(control_dims['X'], control_dims['Y'], c=control_dims['SoS'])
ax.set_xlabel('X (Executive-Cognitive Functioning)', fontsize = 15)
ax.set_ylabel('Y (Intensity of Exp/Activation)', fontsize = 15)
plt.title("Projection of SoS Over X-Y Plane of Experiences (excluding P16, P20, and P25)", fontsize = 16, y = 1.04)
plt.xlim([-5, 5])
plt.ylim([0, 10])

#centroid point (red)
X_mean = control_dims['X'].mean()
Y_mean = control_dims['Y'].mean()
ax.plot(X_mean, Y_mean, 'ro', markersize=16)
    
x = control_dims['X']
y = control_dims['Y']
z = control_dims['SoS']
plt.tricontour(x, y, z, 10, linewidths=0.2, colors='k')
plt.tricontourf(x, y, z, 10)    
plt.show()

lat = control_dims["X"]
long = control_dims["Y"]
ax = sns.kdeplot(lat, long, cmap="Blues", shade=True, shade_lowest=False, cut=0)
plt.title("Heatmap of Control (excluding P16, P20, and P25)", fontsize = 15, y = 1.04)
plt.xlim([-5, 5])
plt.ylim([0, 10])
plt.grid()
plt.show()

#perform two sample t-test with equal variances
stats.ttest_ind(a=P16_dims, b=P25_dims, equal_var=True)

#perform two sample t-test with equal variances
stats.ttest_ind(a=P25_dims, b=control_dims, equal_var=True)

#perform two sample t-test with equal variances
stats.ttest_ind(a=P20_dims, b=control_dims, equal_var=True)

#perform two sample t-test with equal variances
stats.ttest_ind(a=P16_dims, b=control_dims, equal_var=True)

#perform two sample t-test with equal variances
stats.ttest_ind(a=P16_dims, b=P20_dims, equal_var=True)

#perform two sample t-test with equal variances
stats.ttest_ind(a=P20_dims, b=P25_dims, equal_var=True)

# # Machine Learning for Predicting Mental Illness
import warnings
warnings.filterwarnings('ignore')
pd.set_option('display.max_columns', None)
import statsmodels.formula.api as smf

from sklearn.model_selection import train_test_split
from sklearn import metrics

from sklearn.tree import DecisionTreeClassifier
from sklearn.neighbors import KNeighborsClassifier
from sklearn import svm
from sklearn.neural_network import MLPRegressor
from sklearn.preprocessing import StandardScaler
from sklearn.decomposition import PCA

#define scaler
scaler = StandardScaler()
#create copy of DataFrame
scaled_df=dimensions.copy()
#created scaled version of DataFrame
scaled_df=pd.DataFrame(scaler.fit_transform(scaled_df), columns=scaled_df.columns)
#define PCA model to use
pca = PCA(n_components=4)
#fit PCA model to data
pca_fit = pca.fit(scaled_df)

PC_values = np.arange(pca.n_components_) + 1
plt.plot(PC_values, pca.explained_variance_ratio_, 'o-', linewidth=2, color='blue')
plt.title('Scree Plot')
plt.xlabel('Principal Component')
plt.ylabel('Variance Explained')
plt.show()

print(pca.explained_variance_ratio_)

from statsmodels.multivariate.manova import MANOVA
fit = MANOVA.from_formula('X * Y * Z ~ SoS', data=dimensions)
print(fit.mv_test())

from statsmodels.multivariate.manova import MANOVA
fit = MANOVA.from_formula('X * Y * Z ~ SoS', data=centroids)
print(fit.mv_test())

from statsmodels.multivariate.manova import MANOVA
fit = MANOVA.from_formula('X * Y * Z ~ SoS', data=scaled_df)
print(fit.mv_test())

profile_columns = list(profile_clean.columns.values)
columns = list(vectors.columns.values)
data = profile_clean.merge(vectors, how = 'left')

from sklearn.neural_network import MLPClassifier

# The independent variables are X, Y, and Z. The dependent variable is SoS.
X = vectors[['X', 'Y', 'Z']]
y = vectors[['SoS']]

# Splitting the data into training and test data
X_train, X_test, y_train, y_test = train_test_split(X, y, train_size=0.75, test_size=0.25, random_state=10)

print('The shape of training features is:', X_train.shape)
print('The shape of testing features is:', X_test.shape)

neuralNetworkMLP = MLPClassifier(random_state = 1)
neuralNetworkMLP.fit(X_train, y_train)
y_pred = neuralNetworkMLP.predict(X_test)

accuracy = metrics.accuracy_score(y_test, y_pred)
print('The overall accuracy of the Neural Network classifier is:', round(accuracy*100,2), '%')

#SoS as dependent variable
m1 = str('SoS ~ Age + gender + trans + econ_stance + cultural_stance + education + soc_class + dis_status + X + Y + Z')
fittedModel = smf.ols(m1, data = data).fit()
print(fittedModel.summary())

#SoS as dependent variable - centroids + demographics
m1 = str('SoS_mean ~ Age + gender + trans + econ_stance + cultural_stance + education + soc_class + dis_status + Z_mean + Y_mean + X_mean')
fittedModel = smf.ols(m1, data = profile_w_centroids).fit()
print(fittedModel.summary())

#SoS as dependent variable - centroids
m1 = str('SoS_mean ~ Z_mean + Y_mean + X_mean')
fittedModel = smf.ols(m1, data = profile_w_centroids).fit()
print(fittedModel.summary())

#SoS as dependent variable - profile data only
m1 = str('SoS_mean ~ Age + gender + trans + econ_stance + cultural_stance + education + soc_class + dis_status')
fittedModel = smf.ols(m1, data = profile_w_centroids).fit()
print(fittedModel.summary())

#X as dependent variable
m1 = str('X ~ Age + gender + trans + econ_stance + cultural_stance + education + soc_class + dis_status + SoS + Y + Z')
fittedModel = smf.ols(m1, data = data).fit()
print(fittedModel.summary())

#X as dependent variable - centroids
m1 = str('X_mean ~ SoS_mean + Y_mean + Z_mean')
fittedModel = smf.ols(m1, data = profile_w_centroids).fit()
print(fittedModel.summary())

#X as dependent variable - centroids + demographics
m1 = str('X_mean ~ Age + gender + trans + econ_stance + cultural_stance + education + soc_class + dis_status + SoS_mean + Y_mean + Z_mean')
fittedModel = smf.ols(m1, data = profile_w_centroids).fit()
print(fittedModel.summary())

#X as dependent variable - profile data only
m1 = str('X_mean ~ Age + gender + trans + econ_stance + cultural_stance + education + soc_class + dis_status')
fittedModel = smf.ols(m1, data = profile_w_centroids).fit()
print(fittedModel.summary())

#Y as dependent variable
m1 = str('Y ~ Age + gender + trans + econ_stance + cultural_stance + education + soc_class + dis_status + SoS + X + Z')
fittedModel = smf.ols(m1, data = data).fit()
print(fittedModel.summary())

#Y as dependent variable - centroids + demographics
m1 = str('Y_mean ~ Age + gender + trans + econ_stance + cultural_stance + education + soc_class + dis_status + SoS_mean + X_mean + Z_mean')
fittedModel = smf.ols(m1, data = profile_w_centroids).fit()
print(fittedModel.summary())

#Y as dependent variable - centroids
m1 = str('Y_mean ~ SoS_mean + X_mean + Z_mean')
fittedModel = smf.ols(m1, data = profile_w_centroids).fit()
print(fittedModel.summary())

#Y as dependent variable - profile data only
m1 = str('Y_mean ~ Age + gender + trans + econ_stance + cultural_stance + education + soc_class + dis_status')
fittedModel = smf.ols(m1, data = profile_w_centroids).fit()
print(fittedModel.summary())

#Z as dependent variable
m1 = str('Z ~ Age + gender + trans + econ_stance + cultural_stance + education + soc_class + dis_status + SoS + Y + X')
fittedModel = smf.ols(m1, data = data).fit()
print(fittedModel.summary())

#Z as dependent variable - centroids + demographics
m1 = str('Z_mean ~ Age + gender + trans + econ_stance + cultural_stance + education + soc_class + dis_status + SoS_mean + Y_mean + X_mean')
fittedModel = smf.ols(m1, data = profile_w_centroids).fit()
print(fittedModel.summary())

#Z as dependent variable - centroids
m1 = str('Z_mean ~ SoS_mean + Y_mean + X_mean')
fittedModel = smf.ols(m1, data = profile_w_centroids).fit()
print(fittedModel.summary())

#Z as dependent variable - profile data only
m1 = str('Z_mean ~ Age + gender + trans + econ_stance + cultural_stance + education + soc_class + dis_status')
fittedModel = smf.ols(m1, data = profile_w_centroids).fit()
print(fittedModel.summary())

#depression as dependent variable - centroids + demographics
m1 = str('maj_depression ~ Age + gender + trans + econ_stance + cultural_stance + education + soc_class + dis_status + Z_mean + Y_mean + X_mean + SoS_mean')
fittedModel = smf.ols(m1, data = profile_w_centroids).fit()
print(fittedModel.summary())

#depression as dependent variable - centroids
m1 = str('maj_depression ~ Z_mean + Y_mean + X_mean + SoS_mean')
fittedModel = smf.ols(m1, data = profile_w_centroids).fit()
print(fittedModel.summary())

#depression as dependent variable - demographics
m1 = str('maj_depression ~ Age + gender + trans + econ_stance + cultural_stance + education + soc_class + dis_status')
fittedModel = smf.ols(m1, data = profile_w_centroids).fit()
print(fittedModel.summary())

#GAD as dependent variable - centroids + demographics
m1 = str('GAD ~ Age + gender + trans + econ_stance + cultural_stance + education + soc_class + dis_status + Z_mean + Y_mean + X_mean + SoS_mean')
fittedModel = smf.ols(m1, data = profile_w_centroids).fit()
print(fittedModel.summary())

#GAD as dependent variable - centroids
m1 = str('GAD ~ Z_mean + Y_mean + X_mean + SoS_mean')
fittedModel = smf.ols(m1, data = profile_w_centroids).fit()
print(fittedModel.summary())

#GAD as dependent variable - demographics
m1 = str('GAD ~ Age + gender + trans + econ_stance + cultural_stance + education + soc_class + dis_status')
fittedModel = smf.ols(m1, data = profile_w_centroids).fit()
print(fittedModel.summary())

#PTSD as dependent variable - centroids + demographics
m1 = str('PTSD ~ Age + gender + trans + econ_stance + cultural_stance + education + soc_class + dis_status + Z_mean + Y_mean + X_mean + SoS_mean')
fittedModel = smf.ols(m1, data = profile_w_centroids).fit()
print(fittedModel.summary())

#PTSD as dependent variable - centroids
m1 = str('PTSD ~ Z_mean + Y_mean + X_mean + SoS_mean')
fittedModel = smf.ols(m1, data = profile_w_centroids).fit()
print(fittedModel.summary())

#PTSD as dependent variable - demographics
m1 = str('PTSD ~ Age + gender + trans + econ_stance + cultural_stance + education + soc_class + dis_status')
fittedModel = smf.ols(m1, data = profile_w_centroids).fit()
print(fittedModel.summary())

#Social Anxiety as dependent variable - centroids + demographics
m1 = str('social_anx ~ Age + gender + trans + econ_stance + cultural_stance + education + soc_class + dis_status + Z_mean + Y_mean + X_mean + SoS_mean')
fittedModel = smf.ols(m1, data = profile_w_centroids).fit()
print(fittedModel.summary())

#social_anx as dependent variable - centroids
m1 = str('social_anx ~ Z_mean + Y_mean + X_mean + SoS_mean')
fittedModel = smf.ols(m1, data = profile_w_centroids).fit()
print(fittedModel.summary())

#social_anx as dependent variable - demographics
m1 = str('social_anx ~ Age + gender + trans + econ_stance + cultural_stance + education + soc_class + dis_status')
fittedModel = smf.ols(m1, data = profile_w_centroids).fit()
print(fittedModel.summary())

#OCD as dependent variable - centroids + demographics
m1 = str('OCD ~ Age + gender + trans + econ_stance + cultural_stance + education + soc_class + dis_status + Z_mean + Y_mean + X_mean + SoS_mean')
fittedModel = smf.ols(m1, data = profile_w_centroids).fit()
print(fittedModel.summary())

#OCD as dependent variable - centroids
m1 = str('OCD ~ Z_mean + Y_mean + X_mean + SoS_mean')
fittedModel = smf.ols(m1, data = profile_w_centroids).fit()
print(fittedModel.summary())

#OCD as dependent variable - demographics
m1 = str('OCD ~ Age + gender + trans + econ_stance + cultural_stance + education + soc_class + dis_status')
fittedModel = smf.ols(m1, data = profile_w_centroids).fit()
print(fittedModel.summary())

#bipolar as dependent variable - centroids + demographics
m1 = str('bipolar ~ Age + gender + trans + econ_stance + cultural_stance + education + soc_class + dis_status + Z_mean + Y_mean + X_mean + SoS_mean')
fittedModel = smf.ols(m1, data = profile_w_centroids).fit()
print(fittedModel.summary())

#bipolar as dependent variable - centroids
m1 = str('bipolar ~ Z_mean + Y_mean + X_mean + SoS_mean')
fittedModel = smf.ols(m1, data = profile_w_centroids).fit()
print(fittedModel.summary())

#bipolar as dependent variable - demographics
m1 = str('bipolar ~ Age + gender + trans + econ_stance + cultural_stance + education + soc_class + dis_status')
fittedModel = smf.ols(m1, data = profile_w_centroids).fit()
print(fittedModel.summary())

#sleep as dependent variable - centroids + demographics
m1 = str('sleep ~ Age + gender + trans + econ_stance + cultural_stance + education + soc_class + dis_status + Z_mean + Y_mean + X_mean + SoS_mean')
fittedModel = smf.ols(m1, data = profile_w_centroids).fit()
print(fittedModel.summary())

#sleep as dependent variable - centroids
m1 = str('sleep ~ Z_mean + Y_mean + X_mean + SoS_mean')
fittedModel = smf.ols(m1, data = profile_w_centroids).fit()
print(fittedModel.summary())

#sleep as dependent variable - demographics
m1 = str('sleep ~ Age + gender + trans + econ_stance + cultural_stance + education + soc_class + dis_status')
fittedModel = smf.ols(m1, data = profile_w_centroids).fit()
print(fittedModel.summary())

#eating as dependent variable - centroids + demographics
m1 = str('eating ~ Age + gender + trans + econ_stance + cultural_stance + education + soc_class + dis_status + Z_mean + Y_mean + X_mean + SoS_mean')
fittedModel = smf.ols(m1, data = profile_w_centroids).fit()
print(fittedModel.summary())

#eating as dependent variable - centroids
m1 = str('eating ~ Z_mean + Y_mean + X_mean + SoS_mean')
fittedModel = smf.ols(m1, data = profile_w_centroids).fit()
print(fittedModel.summary())

#eating as dependent variable - demographics
m1 = str('eating ~ Age + gender + trans + econ_stance + cultural_stance + education + soc_class + dis_status')
fittedModel = smf.ols(m1, data = profile_w_centroids).fit()
print(fittedModel.summary())